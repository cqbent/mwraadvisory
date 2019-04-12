 <?php /**
 * Template Name: Pdf embedded template
 
 */

 //$url='http://mwra.knoxtest.com/wp-content/uploads/2016/07/0-COMBINED-DOCUMENT-2015.pdf';
echo $url=$_GET['pdf_url'];
 //get_header();
echo do_shortcode("[pdf-embedder url=".$url."]");
 //get_footer();
 ?>
 <script type='text/javascript'>
/* <![CDATA[ */
var pdfemb_trans = {"worker_src":"http:\/\/mwra.knoxtest.com\/wp-content\/plugins\/pdf-embedder\/js\/pdfjs\/pdf.worker.min.js","cmap_url":"http:\/\/mwra.knoxtest.com\/wp-content\/plugins\/pdf-embedder\/js\/pdfjs\/cmaps\/","objectL10n":{"loading":"Loading...","page":"Page","zoom":"Zoom","prev":"Previous page","next":"Next page","zoomin":"Zoom In","zoomout":"Zoom Out","secure":"Secure","download":"Download PDF","fullscreen":"Full Screen","domainerror":"Error: URL to the PDF file must be on exactly the same domain as the current web page.","clickhereinfo":"Click here for more info","widthheightinvalid":"PDF page width or height are invalid","viewinfullscreen":"View in Full Screen"},"poweredby":"1"};
/* ]]> */
</script>
 <link rel='stylesheet' id='pdfemb_embed_pdf_css-css'  href='http://mwra.knoxtest.com/wp-content/plugins/pdf-embedder/css/pdfemb-embed-pdf.css?ver=4.4.4' type='text/css' media='all' />
 <script type='text/javascript' src='http://mwra.knoxtest.com/wp-includes/js/jquery/jquery.js?ver=1.11.3'></script>
 <script type='text/javascript' src='http://mwra.knoxtest.com/wp-content/plugins/pdf-embedder/js/all-pdfemb-basic.min.js?ver=4.4.4'></script>
<script type='text/javascript' src='http://mwra.knoxtest.com/wp-content/plugins/pdf-embedder/js/pdfjs/compatibility.min.js?ver=4.4.4'></script>
<script type='text/javascript' src='http://mwra.knoxtest.com/wp-content/plugins/pdf-embedder/js/pdfjs/pdf.min.js?ver=4.4.4'></script>
 