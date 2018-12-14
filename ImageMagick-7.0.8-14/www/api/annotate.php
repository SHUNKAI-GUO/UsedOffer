



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
  <title>MagickCore, C API: Annotate an Image @ ImageMagick</title>
  <meta name="application-name" content="ImageMagick">
  <meta name="description" content="Use ImageMagick® to create, edit, compose, convert bitmap images. With ImageMagick you can resize your image, crop it, change its shades and colors, add captions, among other operations.">
  <meta name="application-url" content="https://imagemagick.org">
  <meta name="generator" content="PHP">
  <meta name="keywords" content="magickcore, c, api:, annotate, an, image, ImageMagick, PerlMagick, image processing, image, photo, software, Magick++, OpenMP, convert">
  <meta name="rating" content="GENERAL">
  <meta name="robots" content="INDEX, FOLLOW">
  <meta name="generator" content="ImageMagick Studio LLC">
  <meta name="author" content="ImageMagick Studio LLC">
  <meta name="revisit-after" content="2 DAYS">
  <meta name="resource-type" content="document">
  <meta name="copyright" content="Copyright (c) 1999-2017 ImageMagick Studio LLC">
  <meta name="distribution" content="Global">
  <meta name="magick-serial" content="P131-S030410-R485315270133-P82224-A6668-G1245-1">
  <meta name="google-site-verification" content="_bMOCDpkx9ZAzBwb2kF3PRHbfUUdFj2uO8Jd1AXArz4">
  <link href="https://imagemagick.org/api/annotate.php" rel="canonical">
  <link href="https://imagemagick.org/image/wand.png" rel="icon">
  <link href="https://imagemagick.org/image/wand.ico" rel="shortcut icon">
  <link href="https://imagemagick.org/assets/magick-css.php" rel="stylesheet">
</head>
<body>
  <header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="https://imagemagick.org/"><img class="d-block" id="icon" alt="ImageMagick" width="32" height="32" src="https://imagemagick.org/image/wand.ico"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarsExampleDefault" style="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="https://imagemagick.org/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="https://imagemagick.org/script/download.php">Download</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="https://imagemagick.org/script/command-line-tools.php">Tools</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="https://imagemagick.org/script/command-line-processing.php">Command-line</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="https://imagemagick.org/script/resources.php">Resources</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="https://imagemagick.org/script/develop.php">Develop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://imagemagick.org/discourse-server/">Community</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="../script/search.php">
      <input class="form-control mr-sm-2" type="text" name="q" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="sa">Search</button>
    </form>
    </div>
  </nav>
  <div class="container">
   <script async="async" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-3129977114552745"
         data-ad-slot="6345125851"
         data-ad-format="auto"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

  </div>
  </header>
  <main class="container">
    <div class="magick-template">
<div class="magick-header">
<p class="text-center"><a href="annotate.php#AnnotateImage">AnnotateImage</a> &bull; <a href="annotate.php#FormatMagickCaption">FormatMagickCaption</a> &bull; <a href="annotate.php#GetMultilineTypeMetrics">GetMultilineTypeMetrics</a> &bull; <a href="annotate.php#GetTypeMetrics">GetTypeMetrics</a></p>

<h2><a href="https://imagemagick.org/api/MagickCore/annotate_8c.html" id="AnnotateImage">AnnotateImage</a></h2>

<p>AnnotateImage() annotates an image with text.  Optionally you can include any of the following bits of information about the image by embedding the appropriate special characters:</p>

<pre class="text">
    \n   newline
    \r   carriage return
    &lt;    less-than character.
    &gt;    greater-than character.
    &amp;    ampersand character.
 a percent sign
    b   file size of image read in
    c   comment meta-data property
    d   directory component of path
    e   filename extension or suffix
    f   filename (including suffix)
    g   layer canvas page geometry   (equivalent to "WxHXY")
    h   current image height in pixels
    i   image filename (note: becomes output filename for "info:")
    k   CALCULATED: number of unique colors
    l   label meta-data property
    m   image file format (file magic)
    n   number of images in current image sequence
    o   output filename  (used for delegates)
    p   index of image in current image list
    q   quantum depth (compile-time constant)
    r   image class and colorspace
    s   scene number (from input unless re-assigned)
    t   filename without directory or extension (suffix)
    u   unique temporary filename (used for delegates)
    w   current width in pixels
    x   x resolution (density)
    y   y resolution (density)
    z   image depth (as read in unless modified, image save depth)
    A   image transparency channel enabled (true/false)
    C   image compression type
    D   image GIF dispose method
    G   original image size (wxh; before any resizes)
    H   page (canvas) height
    M   Magick filename (original file exactly as given,  including read mods)
    O   page (canvas) offset ( = XY )
    P   page (canvas) size ( = WxH )
    Q   image compression quality ( 0 = default )
    S   ?? scenes ??
    T   image time delay (in centi-seconds)
    U   image resolution units
    W   page (canvas) width
    X   page (canvas) x offset (including sign)
    Y   page (canvas) y offset (including sign)
    Z   unique filename (used for delegates)
    @   CALCULATED: trim bounding box (without actually trimming)
    #   CALCULATED: 'signature' hash of image values
</pre>

<p>The format of the AnnotateImage method is:</p>

<pre class="text">
MagickBooleanType AnnotateImage(Image *image,DrawInfo *draw_info,
  ExceptionInfo *exception)
</pre>

<p>A description of each parameter follows:</p>

<dd>
</dd>

<dd> </dd>
<dl class="dl-horizontal">
<dt>image</dt>
<dd>the image. </dd>

<dd> </dd>
<dt>draw_info</dt>
<dd>the draw info. </dd>

<dd> </dd>
<dt>exception</dt>
<dd>return any errors or warnings in this structure. </dd>

<dd>  </dd>
</dl>
<h2><a href="https://imagemagick.org/api/MagickCore/annotate_8c.html" id="FormatMagickCaption">FormatMagickCaption</a></h2>

<p>FormatMagickCaption() formats a caption so that it fits within the image width.  It returns the number of lines in the formatted caption.</p>

<p>The format of the FormatMagickCaption method is:</p>

<pre class="text">
ssize_t FormatMagickCaption(Image *image,DrawInfo *draw_info,
  const MagickBooleanType split,TypeMetric *metrics,char **caption,
  ExceptionInfo *exception)
</pre>

<p>A description of each parameter follows.</p>

<dt>image</dt>
<p>The image.</p>

<dt>draw_info</dt>
<p>the draw info.</p>

<dt>split</dt>
<p>when no convenient line breaks-- insert newline.</p>

<dt>metrics</dt>
<p>Return the font metrics in this structure.</p>

<dt>caption</dt>
<p>the caption.</p>

<dt>exception</dt>
<p>return any errors or warnings in this structure.</p>

<h2><a href="https://imagemagick.org/api/MagickCore/annotate_8c.html" id="GetMultilineTypeMetrics">GetMultilineTypeMetrics</a></h2>

<p>GetMultilineTypeMetrics() returns the following information for the specified font and text:</p>

<pre class="text">
    character width
    character height
    ascender
    descender
    text width
    text height
    maximum horizontal advance
    bounds: x1
    bounds: y1
    bounds: x2
    bounds: y2
    origin: x
    origin: y
    underline position
    underline thickness
</pre>

<p>This method is like GetTypeMetrics() but it returns the maximum text width and height for multiple lines of text.</p>

<p>The format of the GetMultilineTypeMetrics method is:</p>

<pre class="text">
MagickBooleanType GetMultilineTypeMetrics(Image *image,
  const DrawInfo *draw_info,TypeMetric *metrics,ExceptionInfo *exception)
</pre>

<p>A description of each parameter follows:</p>

<dd>
</dd>

<dd> </dd>
<dl class="dl-horizontal">
<dt>image</dt>
<dd>the image. </dd>

<dd> </dd>
<dt>draw_info</dt>
<dd>the draw info. </dd>

<dd> </dd>
<dt>metrics</dt>
<dd>Return the font metrics in this structure. </dd>

<dd> </dd>
<dt>exception</dt>
<dd>return any errors or warnings in this structure. </dd>

<dd>  </dd>
</dl>
<h2><a href="https://imagemagick.org/api/MagickCore/annotate_8c.html" id="GetTypeMetrics">GetTypeMetrics</a></h2>

<p>GetTypeMetrics() returns the following information for the specified font and text:</p>

<pre class="text">
    character width
    character height
    ascender
    descender
    text width
    text height
    maximum horizontal advance
    bounds: x1
    bounds: y1
    bounds: x2
    bounds: y2
    origin: x
    origin: y
    underline position
    underline thickness
</pre>

<p>The format of the GetTypeMetrics method is:</p>

<pre class="text">
MagickBooleanType GetTypeMetrics(Image *image,const DrawInfo *draw_info,
  TypeMetric *metrics,ExceptionInfo *exception)
</pre>

<p>A description of each parameter follows:</p>

<dd>
</dd>

<dd> </dd>
<dl class="dl-horizontal">
<dt>image</dt>
<dd>the image. </dd>

<dd> </dd>
<dt>draw_info</dt>
<dd>the draw info. </dd>

<dd> </dd>
<dt>metrics</dt>
<dd>Return the font metrics in this structure. </dd>

<dd> </dd>
<dt>exception</dt>
<dd>return any errors or warnings in this structure. </dd>

<dd>  </dd>
</dl>
</div>
    </div>
  </main><!-- /.container -->
  <footer class="magick-footer">
    <p><a href="https://imagemagick.org/script/security-policy.php">Security</a> •
    <a href="https://imagemagick.org/script/architecture.php">Architecture</a> •
    <a href="https://imagemagick.org/script/links.php">Related</a> •
     <a href="https://imagemagick.org/script/sitemap.php">Sitemap</a>
    &nbsp; &nbsp;
    <a href="annotate.php#"><img class="d-inline" id="wand" alt="And Now a Touch of Magick" width="16" height="16" src="https://imagemagick.org/image/wand.ico"/></a>
    &nbsp; &nbsp;
    <a href="http://pgp.mit.edu/pks/lookup?op=get&amp;search=0x89AB63D48277377A">Public Key</a> •
    <a href="https://imagemagick.org/script/support.php">Donate</a> •
    <a href="https://imagemagick.org/script/contact.php">Contact Us</a>
    <br/>
        <small>© 1999-2018 ImageMagick Studio LLC</small></p>
  </footer>

  <!-- Javascript assets -->
  <script src="https://imagemagick.org/assets/magick-js.php" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="https://imagemagick.org/assets/jquery.min.js"><\/script>')</script>
</body>
</html>
<!-- Magick Cache 7th September 2018 16:28 -->