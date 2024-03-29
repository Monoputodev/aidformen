<!DOCTYPE HTML>
<html>
	<head>
		<title>Print.js - Javascript library for HTML elements, PDF and image files printing.</title>
		<meta charset="utf-8" />
		<meta name="description" content="Print.js is a tiny javascript library to help printing from the web. Print friendly support for HTML elements, image files and JSON data. Print PDF files directly form page.">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css?v1" type="text/css"/>
		<link rel="stylesheet" href="print.css" type="text/css" />
		<link rel="stylesheet" href="assets/css/github.css" type="text/css">
		<link rel="stylesheet" href="assets/css/hint.min.css" type="text/css">

		<link rel="icon" type="image/ico" href="/assets/favicon.ico">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!-- Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
						(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-76626003-2', 'auto');
			ga('send', 'pageview');
		</script>
		<!-- Scripts -->
		<script src="print.js?v1.5.0"></script>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
	</head>
	<body id="pageBody">
		<!-- Header -->
		<section id="header" class="dark">
			<header>
				<h1>Print.js</h1>
				<p>A tiny javascript library to help printing from the web.</p>
			</header>
			<footer>
				<a href="#download" download="print.js" class="button scrolly">Download v1.5.0</a>
			</footer>
		</section>

		<!-- PDF Printing -->
		<section class="main" id="pdf">
			<div class="content">
				<div class="container">
					<section>
						<h2>PDF Printing</h2>
						<p>Print.js was primarily written to help us print PDF files directly within our apps, without leaving the interface, and no use of embeds. For unique situations where there is no need for users to open or download the PDF files, and instead, they just need to print them.</p>
						<p>One scenario where this is useful, for example, is when users request to print reports that are generated on the server side. These reports are sent back as PDF files. There is no need to open these files before printing them. Print.js offers a quick way to print these files within our apps.</p>
					</section>

					<section class="in-link light">
						<blockquote>PDF files must be served from the same domain as your app is hosted under. Print.js uses iframe to load files before printing them, therefore, it is limited by the <a href="https://en.wikipedia.org/wiki/Same-origin_policy" target="_blank">Same Origin Policy</a>. This helps preventing <a href="https://en.wikipedia.org/wiki/Cross-site_scripting" target="_blank">Cross-site scripting</a> (XSS) attacks.</blockquote>
					</section>
				</div>
			</div>


			<div class="content dark style5">
				<div class="container">
					<section>
						<h2>Example</h2>

						<p>Add a button to print a PDF file located on your hosting server:</p>
<!-- pdf code -->
<pre><code data-language="html">
 &lt;button type=&quot;button&quot; onclick=&quot;printJS('docs/printjs.pdf')&quot;&gt;
    Print PDF
 &lt;/button&gt;

</code></pre>

						<p>Result:</p>
						<button type="button" onclick="printJS('docs/printjs.pdf')">
							Print PDF
						</button>

					</section>

					<section>
						<p>For large files, you can show a message to the user when loading files.
<!-- pdf code -->
<pre><code data-language="html">
 &lt;button type=&quot;button&quot; onclick=&quot;printJS({printable:'docs/xx_large_printjs.pdf', type:'pdf', showModal:true})&quot;&gt;
    Print PDF with Message
 &lt;/button&gt;

</code></pre>
						<p>Result:</p>
						<button type="button" onclick="printJS({printable:'docs/large_printjs.pdf', type:'pdf', showModal:true})" style="margin-right:20px;">
							Print Large PDF ( 5mb file )
						</button>
						<button type="button" onclick="printJS({printable:'docs/x_large_printjs.pdf', type:'pdf', showModal:true})" style="margin-right:20px;">
							Print Extra Large PDF ( 16mb file )
						</button>
					</section>

					<section>
						<p>The library supports base64 PDF printing:
<!-- pdf code -->
<pre><code data-language="html">
 &lt;button type=&quot;button&quot; onclick=&quot;printJS({printable: base64, type: 'pdf', base64: true})&quot;&gt;
    Print PDF with Message
 &lt;/button&gt;

</code></pre>
						<p>Result:</p>
						<button type="button" onclick="printPdfBase64()" style="margin-right:20px;">
							Print base64 PDF
						</button>
					</section>
				</div>
			</div>
		</section>


		<!-- HTML Printing -->
		<section class="main" id="html">
			<div class="content">
				<div class="container">
					<section>
						<header>
							<h2>HTML Printing</h2>
						</header>
						<p>Sometimes we just want to print selected parts of a HTML page, and that can be tricky. With Print.js, we can easily pass the id of the element that we want to print. The element can be of any tag, as long it has a unique id. The library will try to print it very close to how it looks on screen, and at the same time, it will create a printer friendly format for it.</p>
					</section>
				</div>
			</div>


			<!-- Example HTML 1 -->
			<div class="content dark style5">
				<div class="container">
					<section>
						<header>
							<h2>Example</h2>
							<p>Add a print button to a HTML form:</p>
						</header>

<!-- html code -->
<pre><code data-language="html">
 &lt;form method=&quot;post&quot; action=&quot;#&quot; id=&quot;printJS-form&quot;&gt;
    ...
 &lt;/form&gt;

 &lt;button type=&quot;button&quot; onclick=&quot;printJS('printJS-form', 'html')&quot;&gt;
    Print Form
 &lt;/button&gt;

</code></pre>
						<p>Result:</p>

						<form method="post" action="#" id="printJS-form">
							<div style="display: flex; margin-bottom: 10px;">
								<div style="flex: 1;padding-right: 10px;">
									Name:
									<input type="text" name="name" id="name" value="John Doe" placeholder="Name" />
								</div>
								<div style="flex: 1;">
									Email:
									<input type="text" name="email" id="email" value="john@doe.com" placeholder="Email" />
								</div>
							</div>
							<div>
								<div>
									Message:
									<textarea name="message" id="message" placeholder="Message">Print HTML Elements</textarea>
								</div>
							</div>
						</form>

						<button type="button" onclick="printJS({ printable: 'printJS-form', type: 'html', css: ['/assets/css/main.css?v1'] })">
							Print Form
						</button>

						<hr/>

						<p>Print.js accepts an object with arguments. Let's print the form again, but now we will add a header to the page:</p>

<!-- html code -->
<pre><code data-language="html">
 &lt;button type=&quot;button&quot; onclick=&quot;printJS({ printable: 'printJS-form', type: 'html', header: 'PrintJS - Form Element Selection' })&quot;&gt;
    Print Form with Header
 &lt;/button&gt;

</code></pre>
                        <p>Result:</p>

						<button type="button" onclick="printJS({ printable: 'printJS-form', type: 'html', header: 'PrintJS - Form Element Selection', css: ['/assets/css/main.css?v1'] })">
							Print Form with Header
						</button>

					</section>
				</div>
			</div>
		</section>


        <!-- Image Printing -->
        <section class="main" id="image">
            <div class="content">
                <div class="container">
                    <section>
                        <header>
                            <h2>Image Printing</h2>
                        </header>
                        <p>Print.js can be used to quickly print any image on your page, by passing the image url. This can be useful when you have multiple images on the screen, using a low resolution version of the images. When users try to print the selected image, you can pass the high resolution url to Print.js.</p>
                    </section>
                </div>
            </div>

            <div class="content dark style5">
                <div class="container">
                    <section>
                        <header>
                            <h2>Example</h2>
                        </header>

                        <p>Load images on your page with just the necessary resolution you need on screen:</p>

<pre><code data-language="html">
 &lt;img src=&quot;images/print-01.jpg&quot; /&gt;

</code></pre>

                        <p>In your javascript, pass the highest resolution image url to Print.js for a better print quality:</p>

<pre><code data-language="generic">
 printJS('images/print-01-highres.jpg', 'image')

</code></pre>

                        <p>Result:</p>

                        <div class="imgGallery">
                            <div>
                                <div>
                                    <img src="images/print-01.jpg" alt=""/>
                                    <a href="#" onclick="printJS('images/print-01-highres.jpg', 'image');return false;">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>
                                <div>
                                    <img src="images/print-02.jpg" />
                                    <a href="#" onclick="printJS('images/print-02-highres.jpg', 'image');return false;">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>
                                <div>
                                    <img src="images/print-03.jpg" />
                                    <a href="#" onclick="printJS('images/print-03-highres.jpg', 'image');return false;">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <img src="images/print-04.jpg" />
                                    <a href="#" onclick="printJS('images/print-04-highres.jpg', 'image');return false;">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>
                                <div>
                                    <img src="images/print-05.jpg" />
                                    <a href="#" onclick="printJS('images/print-05-highres.jpg', 'image');return false;">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>
                                <div>
                                    <img src="images/print-06.jpg" />
                                    <a href="#" onclick="printJS('images/print-06-highres.jpg', 'image');return false;">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </section>

					<section>
						<blockquote>Print.js uses promises to make sure the images are loaded before trying to print. This is useful when printing high resolution images that are not yet loaded, like the example above.</blockquote>
					</section>

					<section>
						<p>You can also add a header to the image being printed:</p>

<pre><code data-language="generic">
 printJS({printable: 'images/print-01-highres.jpg', type: 'image', header: 'My cool image header'})

</code></pre>

					<div>
						<p>Result:</p>
						<button onclick="printJS({printable: 'images/print-01-highres.jpg', type: 'image', header: 'My cool image header'});return false;">
							Print Image With Header
						</button>
					</div>
					</section>

					<section>
						<p>To print multiple images together, we can pass an array of images. We can also pass the style to be applied on each image:</p>

<pre><code data-language="generic">
 printJS({
  printable: ['images/print-01-highres.jpg', 'images/print-02-highres.jpg', 'images/print-03-highres.jpg'],
  type: 'image',
  header: 'Multiple Images',
  imageStyle: 'width:50%;margin-bottom:20px;'
 })

</code></pre>

						<div>
							<p>Result:</p>
							<button onclick="printJS({printable: ['images/print-01-highres.jpg', 'images/print-02-highres.jpg', 'images/print-03-highres.jpg'], type: 'image', header: 'Multiple Images', imageStyle: 'width:50%;margin-bottom:20px;'});return false;">
								Print Multiple Images
							</button>
						</div>
					</section>
                </div>
            </div>
        </section>


        <!-- JSON Printing -->
		<section class="main" id="json">
			<div class="content">
				<div class="container">
					<section>
						<header>
							<h2>JSON Printing</h2>
						</header>
						<p>A simple and quick way to print dynamic data or array of javascript objects.</p>
					</section>
				</div>
			</div>

			<div class="content dark style5">
				<div class="container">
					<section>
						<header>
							<h2>Example</h2>
							<p></p>
						</header>

						<p>We have the following data set in our javascript code. This would probably come from an AJAX call to a server API:</p>

<!-- json code -->
<pre><code data-language="generic">
 someJSONdata = [
    {
       name: 'John Doe',
       email: 'john@doe.com',
       phone: '111-111-1111'
    },
    {
       name: 'Barry Allen',
       email: 'barry@flash.com',
       phone: '222-222-2222'
    },
    {
       name: 'Cool Dude',
       email: 'cool@dude.com',
       phone: '333-333-3333'
    }
 ]

</code></pre>

						<p>We can pass it to Print.js:</p>

<pre><code data-language="html">
 &lt;button type=&quot;button&quot; onclick=&quot;printJS({printable: someJSONdata, properties: ['name', 'email', 'phone'], type: 'json'})&quot;&gt;
    Print JSON Data
 &lt;/button&gt;

</code></pre>
						<p>Result:</p>

						<button type="button" onclick="printJS({ printable: someJSONdata, properties: ['name', 'email', 'phone'], type: 'json', documentTitle: 'Print.js JSON Test' })">
							Print JSON Data
						</button>

						<hr/>

						<p>We can style the data grid by passing some custom css:</p>

<pre><code data-language="html">
 &lt;button type=&quot;button&quot; onclick=&quot;printJS({
	    printable: someJSONdata,
	    properties: ['name', 'email', 'phone'],
	    type: 'json',
	    gridHeaderStyle: 'color: red;  border: 2px solid #3971A5;',
	    gridStyle: 'border: 2px solid #3971A5;'
	})&quot;&gt;
    Print JSON Data
 &lt;/button&gt;

</code></pre>
						<p>Result:</p>

						<button type="button" onclick="printJS({ printable: someJSONdata, properties: ['name', 'email', 'phone'], type: 'json', gridHeaderStyle: 'color: red;  border: 2px solid #3971A5;', gridStyle: 'border: 2px solid #3971A5;' })">
							Print Styled JSON Data
						</button>

						<hr/>

						<p>We can customize the table header text sending an object array</p>

<pre><code data-language="html">
 &lt;button type=&quot;button&quot; onclick=&quot;printJS({
	    printable: someJSONdata,
	    properties: [
		{ field: 'name', displayName: 'Full Name'},
		{ field: 'email', displayName: 'E-mail'},
		{ field: 'phone', displayName: 'Phone'}
	    ],
	    type: 'json'
        })&quot;&gt;
    Print with custom table header text
 &lt;/button&gt;

</code></pre>
						<p>Result:</p>
						<button type="button" onclick="printJS({
									printable: someJSONdata,
									properties: [
										{ field: 'name', displayName: 'Full Name'},
										{ field: 'email', displayName: 'E-mail'},
										{ field: 'phone', displayName: 'Phone'}
									],
									type: 'json'
							})">
							Print with custom table header text
						</button>
						 
						 <hr/>
 
						 <p>JSON, HTML and Image print can receive a raw HTML header:</p>
 
 <pre><code data-language="html">
&lt;button type=&quot;button&quot; onclick=&quot;printJS({
		printable: someJSONdata,
		type: 'json',
		properties: ['name', 'email', 'phone'],
		header: '&lt;h3 class="custom-h3"&gt;My custom header&lt;/h3&gt;',
		style: '.custom-h3 { color: red; }'
	  })&quot;&gt;
	Print header raw html
&lt;/button&gt;
 
 </code></pre>
						 <p>Result:</p>
 
						 <button
							 type="button"
							 onclick="printJS({
								 	 header: `<h3 class='custom-h3'>My custom header</h3>`,
									 printable: someJSONdata,
									 properties: ['name', 'email', 'phone'],
									 type: 'json',
									 style: '.custom-h3 { color: red; }'
									})">
							 Print JSON with raw HTML header
						 </button>
 

					</section>
				</div>
			</div>
		</section>

		<section class="main" id="docs">
			<div class="content download">
				<div class="container" id="download">
					<section>
						<header>
							<h2>Download and Install</h2>
						</header>
						<p>You can download the latest version of Print.js from the GitHub releases.</p>
						<p style="margin-bottom:30px;">
							<a href="https://github.com/crabbly/Print.js/releases/tag/v1.5.0" class="button">Download v1.5.0</a>
						</p>

						<p>To install using npm:</p>

<pre><code data-language="javascript">
  npm install print-js --save

</code></pre>

						<p>To install using yarn:</p>

<pre><code data-language="javascript">
  yarn add print-js

</code></pre>

						<p>When installing via npm or yarn, import the library into your project:</p>

<pre><code data-language="javascript">
  import print from 'print-js'

</code></pre>
	
						<p id="cdn">CDN is also available, thanks to <a href="https://www.keycdn.com" target="_blank">KeyCDN:</a></p>
<pre><code data-language="javascript">
  https://printjs-4de6.kxcdn.com/print.min.js
  https://printjs-4de6.kxcdn.com/print.min.css

</code></pre>

						<hr />

						<h2 id="documentation">Getting Started</h2>
						<p>First we need to include the Print.js library on the page.</p>
<pre><code>
 &lt;script src=&quot;print.js&quot;&gt;&lt;/script&gt;

</code></pre>
						<p>If you will use the modal feature, also include Print.css on the page.</p>
<pre><code data-language="html">
 &lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;print.css&quot;&gt;

</code></pre>

						<p>That's it. You can now use Print.js in your pages.</p>
						<p>When writing your javascript code, remember that the library occupies a global variable of <code>printJS</code>.</p>

						<h2>Using Print.js</h2>
						<p>There are four print document types available: <code>'pdf'</code>, <code>'html'</code>, <code>'image'</code> and <code>'json'</code>.</p>
						<p>The default type is <code>'pdf'</code>.</p>
						<p>It's basic usage is to call <code>printJS()</code> and just pass in a PDF document url: <code>printJS('docs/PrintJS.pdf')</code>.</p>
						<p>For image files, the idea is the same, but you need to pass a second argument: <code>printJS('images/PrintJS.jpg', 'image')</code>.</p>
						<p>To print HTML elements, in a similar way, pass in the element id and type: <code>printJS('myElementId', 'html')</code>.</p>
						<p>When printing JSON data, pass in the data, type and the data properties that you want to print: <br/><code>printJS({printable: myData, type: 'json', properties: ['prop1', 'prop2', 'prop3']})</code>;</p>

						<h2 id="configuration">Configuration</h2>
						<p>Print.js will accept an object as argument, where you can configure some options:</p>
						<div class="grid">
							<div class="grid-row" style="color: #3971A5; font-weight:400;">
								<div class="g1">Argument</div>
								<div class="g1">Default Value</div>
								<div class="g2">Description</div>
							</div>
							<div class="grid-row">
								<div class="g1">printable</div>
								<div class="g1">null</div>
								<div class="g2">Document source: pdf or image url, html element id or json data object.</div>
							</div>
							<div class="grid-row">
								<div class="g1">type</div>
								<div class="g1">'pdf'</div>
								<div class="g2">Printable type. Availble print options are: pdf, html, image, json and raw-html.</div>
							</div>
							<div class="grid-row">
								<div class="g1">header</div>
								<div class="g1">null</div>
								<div class="g2">Optional header to be used with HTML, Image or JSON printing. It will be placed on the top of the page. This property will accept text or raw HTML.</div>
							</div>
							<div class="grid-row">
								<div class="g1">headerStyle</div>
								<div class="g1">'font-weight: 300;'</div>
								<div class="g2">Optional header style to be applied to the header text.</div>
							</div>
							<div class="grid-row">
								<div class="g1">maxWidth</div>
								<div class="g1">800</div>
								<div class="g2">Max document width in pixels. Change this as you need. Used when printing HTML, Images or JSON.</div>
							</div>
							<div class="grid-row">
								<div class="g1">css</div>
								<div class="g1">null</div>
								<div class="g2">This allow us to pass one or more css files URLs that should be applied to the html being printed. Value can be a string with a single URL or an array with multiple URLs.</div>
							</div>
							<div class="grid-row">
								<div class="g1">style</div>
								<div class="g1">null</div>
								<div class="g2">This allow us to pass a string with custom style that should be applied to the html being printed.</div>
							</div>
							<div class="grid-row">
								<div class="g1">scanStyles</div>
								<div class="g1">true</div>
								<div class="g2">When set to false, the library will not process styles applied to the html being printed. Useful when using the <code>css</code> parameter.</div>
							</div>
							<div class="grid-row">
								<div class="g1">targetStyle</div>
								<div class="g1">null</div>
								<div class="g2">By default, the library process some styles only, when printing HTML elements. This option allows you to pass an array of styles that you want to be processed. Ex.: ['padding-top', 'border-bottom']</div>
							</div>
							<div class="grid-row">
								<div class="g1">targetStyles</div>
								<div class="g1">null</div>
								<div class="g2">Same as `targetStyle`, however, this will process any a range of styles. Ex.: ['border', 'padding'], will include 'border-bottom', 'border-top', 'border-left', 'border-right', 'padding-top', etc. <br/>You can also pass ['*'] to process all styles.</div>
							</div>
							<div class="grid-row">
								<div class="g1">ignoreElements</div>
								<div class="g1">[ ]</div>
								<div class="g2">Accepts an array of html ids that should be ignored when printing a parent html element.</div>
							</div>
							<div class="grid-row">
								<div class="g1">properties</div>
								<div class="g1">null</div>
								<div class="g2">Used when printing JSON. These are the object property names.</div>
							</div>
							<div class="grid-row">
								<div class="g1">gridHeaderStyle</div>
								<div class="g1">'font-weight: bold;'</div>
								<div class="g2">Optional style for the grid header when printing JSON data.</div>
							</div>
							<div class="grid-row">
								<div class="g1">gridStyle</div>
								<div class="g1">'border: 1px solid lightgray; margin-bottom: -1px;'</div>
								<div class="g2">Optional style for the grid rows when printing JSON data.</div>
							</div>
							<div class="grid-row">
								<div class="g1">repeatTableHeader</div>
								<div class="g1">true</div>
								<div class="g2">Used when printing JSON data. When set to <code>false</code>, the data table header will show in first page only.</div>
							</div>
							<div class="grid-row">
								<div class="g1">showModal</div>
								<div class="g1">null</div>
								<div class="g2">Enable this option to show user feedback when retrieving or processing large PDF files.</div>
							</div>
							<div class="grid-row">
								<div class="g1">modalMessage</div>
								<div class="g1">'Retrieving Document...'</div>
								<div class="g2">Message displayed to users when <code>showModal</code> is set to <code>true</code>.</div>
							</div>
							<div class="grid-row">
								<div class="g1">onLoadingStart</div>
								<div class="g1">null</div>
								<div class="g2">Function to be executed when PDF is being loaded</div>
							</div>
							<div class="grid-row">
								<div class="g1">onLoadingEnd</div>
								<div class="g1">null</div>
								<div class="g2">Function to be executed after PDF has loaded</div>
							</div>
							<div class="grid-row">
								<div class="g1">documentTitle</div>
								<div class="g1">'Document'</div>
								<div class="g2">When printing html, image or json, this will be shown as the document title.</div>
                            </div>
							<div class="grid-row">
								<div class="g1">fallbackPrintable</div>
								<div class="g1">null</div>
								<div class="g2">When printing pdf, if the browser is not compatible (check browser compatibility table), the library will open the pdf in a new tab. This allow you to pass a different pdf document to be opened instead of the original passed in `printable`. This may be useful if you inject javascript in your alternate pdf file.</div>
                            </div>
							<div class="grid-row">
								<div class="g1">onPdfOpen</div>
								<div class="g1">null</div>
								<div class="g2">When printing pdf, if the browser is not compatible (check browser compatibility table), the library will open the pdf in a new tab. A callback function can be passed here, which will be executed when this happens. It may be useful in some situations where you want to handle your print flow, update user interface, etc.</div>
                            </div>
							<div class="grid-row">
								<div class="g1">onPrintDialogClose</div>
								<div class="g1">null</div>
								<div class="g2">Callback function executed once the browser print dialog is closed.</div>
                            </div>
							<div class="grid-row">
								<div class="g1">onError</div>
								<div class="g1">error => throw error</div>
								<div class="g2">Callback function to be executed when an error occurs.</div>
							</div>
							<div class="grid-row">
								<div class="g1">base64</div>
								<div class="g1">false</div>
								<div class="g2">Used when printing PDF documents passed as base64 data.</div>
                            </div>
							<div class="grid-row">
								<div class="g1">honorMarginPadding <span class="hint--top" aria-label="Use targetStyles, targetStyle, css or style parameters instead" style="font-size:14px;">(deprecated <i class="fa fa-info-circle"></i>)</span></div>
								<div class="g1">true</div>
								<div class="g2">This is used to keep or remove padding and margin from elements that are being printed. Sometimes these styling settings are great on screen but it looks pretty bad when printing. You can remove it by setting this to false.</div>
							</div>
							<div class="grid-row">
								<div class="g1">honorColor <span class="hint--top" aria-label="Use targetStyles, targetStyle, css or style parameters instead" style="font-size:14px;">(deprecated <i class="fa fa-info-circle"></i>)</span></div>
								<div class="g1">false</div>
								<div class="g2">To print text in color, set this property to true. By default all text will be printed in black.</div>
							</div>
							<div class="grid-row">
								<div class="g1">font <span class="hint--top" aria-label="Use css or style parameters instead" style="font-size:14px;">(deprecated <i class="fa fa-info-circle"></i>)</span></div>
								<div class="g1">'TimesNewRoman'</div>
								<div class="g2">Typeface used when printing HTML or JSON.</div>
							</div>
							<div class="grid-row">
								<div class="g1">font_size <span class="hint--top" aria-label="Use css or style parameters instead" style="font-size:14px;">(deprecated <i class="fa fa-info-circle"></i>)</span></div>
								<div class="g1">'12pt'</div>
								<div class="g2">Font size used when printing HTML or JSON.</div>
                            </div>
							<div class="grid-row">
								<div class="g1">imageStyle <span class="hint--top" aria-label="Use css or style parameters instead" style="font-size:14px;">(deprecated <i class="fa fa-info-circle"></i>)</span></div>
								<div class="g1">'width:100%;'</div>
								<div class="g2">Used when printing images. Accepts a string with custom styles to be applied to each image.</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</section>

		<section class="main">
			<div class="content" style="padding-top: 50px;">
				<div class="container" id="browsers">
					<section>
						<header>
							<h2>Browser Compatibility</h2>
							<p>Currently, not all library features are working between browsers. Below are the results of tests done with these major browsers, using their latest versions.</p>
						</header>
						<div class="grid">
							<div class="grid-row" style="color: #3971A5; font-weight:400;">
								<div class="g1"></div>
								<div class="g15"><i class="fa fa-chrome mgr5" aria-hidden="true"></i>Google Chrome</div>
								<div class="g1"><i class="fa fa-safari mgr5" aria-hidden="true"></i>Safari</div>
								<div class="g1"><i class="fa fa-firefox mgr5" aria-hidden="true"></i>Firefox</div>
								<div class="g1"><i class="fa fa-edge mgr5" aria-hidden="true"	></i>Edge</div>
								<div class="g1"><i class="fa fa-opera mgr5" aria-hidden="true"></i>Opera</div>
								<div class="g15"><i class="fa fa-internet-explorer mgr5" aria-hidden="true"></i>Internet Explorer</div>
							</div>
							<div class="grid-row">
								<div class="g1">PDF</div>
								<div class="g15"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g15"><i class="fa fa-times fa-2x danger" aria-hidden="true"></i></div>
							</div>
							<div class="grid-row">
								<div class="g1">HTML</div>
								<div class="g15"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g15"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
							</div>
							<div class="grid-row">
								<div class="g1">Images</div>
								<div class="g15"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g15"><i class="fa fa-times fa-2x danger" aria-hidden="true"></i></div>
							</div>
							<div class="grid-row">
								<div class="g1">JSON</div>
								<div class="g15"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g1"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
								<div class="g15"><i class="fa fa-check fa-2x success" aria-hidden="true"></i></div>
							</div>
						</div>
					</section>

					<section>
						<p>Thank you BrowserStack for the support. Amazing cross-browser testing tool.</p>
						<p><a href="https://www.browserstack.com" target="_blank"><img src="/images/browserstack.png" style="width:200px;"/></a></p>
					</section>
				</div>
			</div>
		</section>

		<section class="main">
			<div class="content dark style5">
				<div class="container" id="support">
					<section class="support in-link">
						<header>
							<h2>Development and Support</h2>
						</header>
						<p><i class="fa fa-bug fa-2x rm10" aria-hidden="true"></i><span>Please report issues and feature requests in <a href="https://github.com/crabbly/Print.js/issues">GitHub Issues</a>.</span></p>
						<p><i class="fa fa-question-circle fa-2x rm10" aria-hidden="true"></i><span>If you have questions when implementing or using the library, ask about it in <a href="https://www.stackoverflow.com" target="_blank">StackOverflow</a>.</span></p>
						<p><i class="fa fa-code fa-2x rm10" aria-hidden="true"></i><span>Pull requests are very welcome! Make sure your patches are well tested: <a href="https://github.com/crabbly/Print.js/blob/master/README.md">README.md</a>.</span></p>
						<p><i class="fa fa-heart fa-2x rm10" aria-hidden="true"></i><span>Print.js was built from the hard work of all these <a href="https://github.com/crabbly/Print.js/graphs/contributors">contributors</a>.</span></p>
					</section>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<section id="footer">
			<ul class="icons">
				<li><a href="https://twitter.com/crabbly" class="icon fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
				<!-- <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li> -->
				<!-- <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li> -->
				<!-- <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li> -->
				<li><a href="https://github.com/crabbly/Print.js" class="icon fa-github"><span class="label">GitHub</span></a></li>
			</ul>
			<div class="copyright">
				<ul class="menu">
					<li>&copy; 2020 Crabbly</li><li>Released under the <a href="https://opensource.org/licenses/MIT" target="_blank">MIT License</a></li><li>HTML Template by <a href="https://html5up.net" target="_blank">HTML5 UP</a></li><li>CDN by <a href="https://www.keycdn.com/" target="_blank">KeyCDN</a></li>
				</ul>
			</div>
		</section>

		<!-- github svg -->
		<a href="https://github.com/crabbly/print.js" class="github-corner"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 0; border: 0; right: 0;"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>
	</body>
</html>
