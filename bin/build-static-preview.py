"""
Builds a static HTML snapshot of the local WordPress site into ./public,
for a client-preview deployment on Vercel. This is NOT the production
deliverable (that's the real WordPress theme) -- it's a read-only, no-backend
copy purely so a client can browse and give feedback before go-live.
"""
import os
import re
import shutil

import requests

BASE = "http://localhost:8000"
ROOT = os.path.join(os.path.dirname(os.path.dirname(os.path.abspath(__file__))), "public")

PAGES = [
    ("/", "index.html"),
    ("/about-us/", "about-us/index.html"),
    ("/quality/", "quality/index.html"),
    ("/engineering/", "engineering/index.html"),
    ("/careers/", "careers/index.html"),
    ("/off-the-shelf/", "off-the-shelf/index.html"),
    ("/fittings/", "fittings/index.html"),
    ("/chemicals/", "chemicals/index.html"),
    ("/fasteners-hardware/", "fasteners-hardware/index.html"),
    ("/request-a-quote/", "request-a-quote/index.html"),
]

ASSET_DIR = "wp-content/themes/martin-aerospace/assets"

IMAGES = [
    "logo.jpg", "box-af-img-01.jpg", "box-ac-img-01.jpg", "box-aph-img-01.jpg",
    "box-af-img-01-hd.jpg", "box-ac-img-01-hd.jpg", "box-aph-img-01-hd.jpg",
    "qualityimg.jpg", "engineer-img.jpg", "engineer-img-big.jpg",
    "fastener-a.jpg", "fastener-b.jpg", "fastener-c.jpg", "fastener-d.jpg", "fastener-e.jpg",
    "feetings-filtered-sm-img.jpg", "feetings-filtered-big-img.jpg",
    "fitttings-filtered-sm-img.jpg", "fitttings1-filtered.jpg",
]

PREVIEW_BANNER = """
<div style="background:#C8102E;color:#fff;text-align:center;padding:10px 16px;font-family:Inter,sans-serif;font-size:14px;position:relative;z-index:1000;">
  Client preview build &mdash; not the live site. The Request a Quote form is mocked for this preview (no email is sent); it will send real quote requests once deployed to WordPress.
</div>
"""

RFQ_PREVIEW_SCRIPT = """
<script>
(function () {
  var form = document.querySelector('.rfq-layout form');
  if (!form) return;
  form.addEventListener('submit', function (e) {
    e.preventDefault();
    var existing = document.querySelector('.form-notice');
    if (existing) existing.remove();
    var notice = document.createElement('div');
    notice.className = 'form-notice form-notice--success';
    notice.textContent = 'Preview only: in the live site this sends a real quote request. Thank you - this is just a demo of the submission flow.';
    form.parentNode.insertBefore(notice, form);
    form.style.display = 'none';
  });
})();
</script>
"""


def fetch(path):
    r = requests.get(BASE + path, timeout=15)
    r.raise_for_status()
    return r.text


def rewrite_html(html):
    # Strip absolute localhost origin so links/assets resolve against whatever domain Vercel serves on.
    html = html.replace(BASE, "")
    # Inject preview banner right after <body ...>
    html = re.sub(r"(<body[^>]*>)", r"\1" + PREVIEW_BANNER, html, count=1)
    # Inject the mock RFQ handler before </body>
    html = html.replace("</body>", RFQ_PREVIEW_SCRIPT + "</body>")
    return html


def write_file(rel_path, content, binary=False):
    full = os.path.join(ROOT, rel_path)
    os.makedirs(os.path.dirname(full), exist_ok=True)
    mode = "wb" if binary else "w"
    kwargs = {} if binary else {"encoding": "utf-8"}
    with open(full, mode, **kwargs) as f:
        f.write(content)


def main():
    if os.path.isdir(ROOT):
        shutil.rmtree(ROOT)
    os.makedirs(ROOT, exist_ok=True)

    for url_path, out_path in PAGES:
        html = fetch(url_path)
        html = rewrite_html(html)
        write_file(out_path, html)
        print(f"page: {url_path} -> public/{out_path}")

    # CSS
    css = fetch("/wp-content/themes/martin-aerospace/style.css")
    write_file("wp-content/themes/martin-aerospace/style.css", css)
    print("asset: style.css")

    # JS
    js = fetch("/wp-content/themes/martin-aerospace/assets/js/main.js")
    write_file("wp-content/themes/martin-aerospace/assets/js/main.js", js)
    print("asset: main.js")

    # Images (binary)
    for img in IMAGES:
        r = requests.get(f"{BASE}/wp-content/themes/martin-aerospace/assets/images/{img}", timeout=15)
        r.raise_for_status()
        write_file(f"wp-content/themes/martin-aerospace/assets/images/{img}", r.content, binary=True)
    print(f"assets: {len(IMAGES)} images")

    print("\nStatic preview build complete ->", ROOT)


if __name__ == "__main__":
    main()
