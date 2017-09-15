# csv-to-sitemap-xml
Converts a csv file into a sitemap.xml 

Creats a sitemap.xml file based on a csv file.

e.g. 

csv file 
```
  http://www.sitename.com/
  http://www.sitename.com/url1/
  http://www.sitename.com/url2/
```

Will output a sitemap.xml of the following content

```
  <?xml version="1.0" encoding="utf-8"?>
  <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
  <url>
    <loc>http://www.sitename.com/</loc>
    <lastmod>2017-09-15T14:42:56+01:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>http://www.sitenam.com/url1/</loc>
    <lastmod>2017-09-15T14:42:56+01:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>http://www.sitenam.com/url1/</loc>
    <lastmod>2017-09-15T14:42:56+01:00</lastmod>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  </urlset>
```
