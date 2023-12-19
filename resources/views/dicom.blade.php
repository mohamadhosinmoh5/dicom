<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>

<html>
<head>
<title>ِDicom 3d Viewer</title>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

<meta name='viewport'
	content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0' />
<meta name='description'
	content='Slice:Drop - Instantly view scientific and medical imaging data in 3D.' />
<meta name='author' content='Daniel Haehn' />

<link href='{{url("")}}/css/bootstrap.css' rel='stylesheet' />
<link href='{{url("")}}/css/bootstrap-responsive.css' rel='stylesheet' />
<link type='text/css' rel='stylesheet' href='{{url("")}}/css/xtheme/jquery.ui.css' />
<link type='text/css' rel='stylesheet' href='{{url("")}}/css/jquery.miniColors.css' />
<link type='text/css' rel='stylesheet' href='{{url("")}}/css/jquery.sidebar.css' />
<link type='text/css' rel='stylesheet' href='{{url("")}}/css/frontpage.css' />
<link type='text/css' rel='stylesheet' href='{{url("")}}/css/viewer.css' />

<script type='text/javascript' src='{{url("")}}/js/jquery.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.ui.js'></script>
<script type='text/javascript' src='{{url("")}}/js/corn.js'></script> 
<script type='text/javascript' src='{{url("")}}/js/dicom.js'></script> 
<script type='text/javascript' src='{{url("")}}/js/jquery.ui.slider.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.miniColors.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.filestyle.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.idTabs.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.sidebar.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.sidebar.volume.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.sidebar.mesh.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.sidebar.fibers.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.viewer.js'></script>
<script type='text/javascript' src='{{url("")}}/js/jquery.frontpage.js'></script>
<script type='text/javascript' src='{{url("")}}/js/dropbox.min.js'></script>
<script type='text/javascript' src='{{url("")}}/js/bootstrap-modal.js'></script>
<script type='text/javascript' src='{{url("")}}/js/x.controller.js'></script>
<script type='text/javascript' src='{{url("")}}/js/x.examples.js'></script>

<script type='text/javascript' src='{{url("")}}/js/x.scene.js'></script>
<script type='text/javascript' src='{{url("")}}/js/x.share.js'></script>
<script type='text/javascript' src='{{url("")}}/js/x.realtime.js'></script>
<script type='text/javascript' src='{{url("")}}/js/xtk.js'></script>

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<!-- Brand new TRAKO support https://github.com/haehn/TRAKO! -->
<script type='text/javascript' src="js/draco/draco_decoder.js"></script>
<script type='text/javascript' src='{{url("")}}/js/xtkTrakoReader.js'></script> 


<script type='text/javascript' src='{{url("")}}/js/pusher.min.js'></script>

<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33092072-1']);
  _gaq.push(['_trackPageview']);
  
  (function() {

    var ga = document.createElement('script');
    ga.type = 'text/javascript';
    ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl'
        : 'http://www') +
        '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Google Analytics -->

</head>
<body id='body' class='webgl_enabled'>
  <input type="hidden" id="token" value="{{csrf_token('')}}" />
  <input type="hidden" id="baseUrl" value="{{url('/')}}" />
	<!-- The frontpage -->
	<div id='frontpage'>

		<div id='content' class='container'>

			<!-- <img src='{{url("")}}/gfx/slicedrop.png' /> -->

			<!-- <div class='hero-unit'>
				<p>Instantly view scientific and medical imaging data in 3D.</p>
				<p>
					<a class='btn btn-medium' data-toggle='modal' href='{{url("")}}/#learnMore'>Learn
						more &raquo;</a>
				</p>
			</div> -->

			<!-- <div class='well examples'>
				<h3>Try the examples..</h3>
				<img id='14yroldImage' src='{{url("")}}/gfx/14yrold.png' class='selectexample'
					style='cursor: pointer;' /> <img id='avfImage'
					src='{{url("")}}/gfx/avf_small.png' style='cursor: pointer;' /> <img
					id='2yroldImage' src='{{url("")}}/gfx/2yrold_small.png'
					style='cursor: pointer;' /> <img id='brainstemImage'
					src='{{url("")}}/gfx/brainstem_small.png' style='cursor: pointer;' />
				<div id='14yrold'>
					A 14 year old healthy male brain. The patient was scanned using a
					structural MRI and a diffusion MRI to highlight connecting brain
					fibers. <b>Loading time: +++</b><span
						class='label label-info viewexample' id='14yroldlink'>View
						Example</span>
				</div>
				<div id='avf' style='display: none'>
					A contrast enhanced 3D MR image showing an arteriovenous fistula
					which is a bypass created by joining an artery and a vein, located
					in an arm. <b>Loading time: +</b><span
						class='label label-info viewexample' id='avflink'>View
						Example</span>
				</div>
				<div id='2yrold' style='display: none'>
					The surface of the left hemisphere of a 2 years old healthy brain.
					The scalar overlay shows the bending energy based on <i>Curvedness</i>.
					<b>Loading time: ++</b><span class='label label-info viewexample'
						id='2yroldlink'>View Example</span>
				</div>
				<div id='brainstem' style='display: none'>
					A region of the brainstem of a human adult including an
					automatically generated segmentation as a label map colorized using
					an anatomical color table. <b>Loading time: +</b> <span
						class='label label-info viewexample' id='brainstemlink'>View
						Example</span>
				</div>
			</div> -->

			<div class='dropzone'>
				<!-- <span>Drop files here or </span> -->
				<input id='filebutton' type='file' multiple onchange='selectfiles(this.files,true)' style='display: none;' />
					<a
						class='btn btn-inverse btn-large' style='vertical-align: super;'
						onclick='javascript:document.getElementById("filebutton").click();'
					>
						Select files
					</a>
					<!-- <br /> -->
				<!-- <span style='font-size: 10px'> Your data stays on your
					computer. No upload required!</span><br />
				<br /> -->
				<!-- <ul class='thumbnails'>
					<li>
						<div class='thumbnail'>
							<img src='{{url("")}}/gfx/fibers.png' alt='' /> Fibers<br />(.trk / .tko)<br /> <br />
						</div>
					</li>
					<li>
						<div class='thumbnail'>
							<img src='{{url("")}}/gfx/dicom.png' alt='' /> Volumes<br />(.mgh / .mgz /
							.nrrd / .nii <br />/ .nii.gz / DICOM)
						</div>
					</li>
					<li>
						<div class='thumbnail'>
							<img src='{{url("")}}/gfx/surface.png' alt='' /> Models<br />(.obj / .vtk / .stl /
							FreeSurfer)<br /> <br />
						</div>
					</li>
				</ul> -->
			</div>

			<!-- <div class='footer'>
				<div class='row' style='margin: auto'>
					<div class='span2 offset8'>
						<ul class='unstyled paddingated'>
							<li style='line-height: 18px'><a
								href='{{url("")}}/http://childrenshospital.org/FNNDSC' target='_blank'>Boston
									Children's Hospital</a></li>
							<li style='line-height: 18px'><a
								href='{{url("")}}/https://github.com/slicedrop/slicedrop.github.com'
								target='_blank'>Source Code</a></li>
							<li style='line-height: 18px'><a href='{{url("")}}/mailto:dev@goxtk.com'
								target='_blank'>Send Feedback</a></li>
						</ul>
					</div>
				</div>
			</div> -->
		</div>
		<!-- /container -->
	</div>

	<!-- Learn more -->
	<div class='modal hide fade' id='learnMore'
		style='display: none; width: 800px; height: 610px; margin-top: -305px; margin-left: -400px;'>
		<div class='modal-header'>
			<button class='close' data-dismiss='modal'>×</button>
			<h3>Try it!!</h3>
		</div>
		<div class='modal-body' style='max-height: 600px'>
			<p>
				<img src='{{url("")}}/gfx/workflow.png' />
			</p>
			<p>
				We think that the best way to render your files is without any
				necessary conversions. Just drop'em on this website and they are ready
				to render. <b>Slice:Drop</b> supports a variety of scientific file formats
				out-of-the-box (see <a
					href='{{url("")}}/https://github.com/xtk/X/wiki/X%3AFileformats'
					target='_blank' style='color:cornflowerblue'>here</a> for a complete list).
			</p>			
			<img src='{{url("")}}/gfx/multitouch.png' style='float:right'/>
			<p>
				<b>Slice:Drop</b> uses WebGL and HTML5 Canvas to render the data in
				2D and 3D. We use our own open-source toolkit to perform the
				rendering, called <a href='{{url("")}}/http://goXTK.com' target='_blank' style='color:cornflowerblue'>XTK</a>.
			</p>
			<p>All data stays on the client and nothing gets transferred via the internet. This is totally safe!
			</p>
			<p>
				We are very keen on your feedback, so please <a
					href='{{url("")}}/mailto:dev@goxtk.com' style='color:cornflowerblue'>email us</a>.
			</p>
		</div>
	</div>

	<!-- Drop note -->
	<div id='drop-box-overlay'>
		<h1>Drop files anywhere...</h1>
	</div>

	<!-- The viewer -->
	<div id='viewer' style='display: none;'>

		<ul class='navigation'>
			<li id='volume' class='navigationLi'><div class='menu'>
					<div class='pin'>
						<span class='ui-icon ui-icon-pin-w pinicon'></span>
					</div>

					<div class='tabbox idTabs' id='volumetabs'>
						<div class='caption'>VOLUME</div>

						<a href='{{url("")}}/#volumeTab' class='selected'>Volume</a> <a
							href='{{url("")}}/#labelmapTab' id='labelmapSwitch'
							style='margin-left: 50px;'>Labelmap</a>
						<div id='volumeTab' class='tabContent'>


							<div id='modes' style='width: 130px; float: left;'>
								<div id='volumerendering'>
									<img src='{{url("")}}/gfx/3d.png' />
								</div>
								<div id='slicing'>
									<img src='{{url("")}}/gfx/2d.png' />
								</div>
							</div>

							<div id='colors'
								style='width: 26px; margin-left: 6px; float: left;'>

								<input id='fgColorVolume' type='hidden'
									class='color-picker black' size='6' value='#ffffff' /> <input
									id='bgColorVolume' type='hidden' class='color-picker black'
									size='6' value='#000000' />
							</div>

							<div id='opacity-label' class='menuLabel'
								style='margin-top: 4px; float: left;'>3D Opacity</div>
							<div id='opacity-volume'
								style='margin-left: 10px; margin-top: 4px; float: left;'></div>

							<div id='windowlevel-label' class='menuLabel'
								style='margin-top: 4px; float: left;'>Window/Level</div>
							<div id='windowlevel-volume'
								style='margin-left: 10px; margin-top: 4px; float: left;'></div>

							<div class='menuLabel' style='margin-top: 4px; float: left;'>Threshold</div>
							<div id='threshold-volume'
								style='margin-left: 10px; margin-top: 4px; float: left;'></div>


						</div>
						<div id='labelmapTab' class='tabContent' style='display: none'>


							<div id='visibility-labelmap' style='width: 130px; float: left;'>
								<div class='menuLabel' style='margin-top: 4px; float: left;'>Show/Hide</div>
								<div id='labelmapvisibility' class='eye show-icon'
									style='margin-left: 6px;'></div>
							</div>

							<div class='menuLabel' style='margin-top: 4px; float: left;'>Labelmap
								Opacity</div>
							<div id='opacity-labelmap'
								style='margin-left: 10px; margin-top: 4px; float: left;'></div>


						</div>
					</div>

				</div></li>

			<li id='mesh' class='navigationLi'><div class='menu'>
					<div class='pin'>
						<span class='ui-icon ui-icon-pin-w pinicon'></span>
					</div>
					<div class='tabbox idTabs'>
						<div class='caption'>MESH</div>

						<a class='meshtabs selected'>Mesh 1</a>
						<div id='mesh1' class='tabContent'>

							<div id='visibility-mesh'
								style='width: 140px; float: left; margin-top: 2px;'>
								<div class='menuLabel' style='margin-top: 4px; float: left;'>Show/Hide</div>
								<div id='meshvisibility' class='eye show-icon'
									style='margin-left: 6px;'></div>
							</div>

							<input type='hidden' id='meshColor' class='color-picker black'
								size='6' value='#0000ff' />

							<div class='menuLabel' style='margin-top: 4px; float: left;'>Opacity</div>
							<div id='opacity-mesh'
								style='margin-left: 10px; margin-top: 4px; float: left;'></div>

							<div class='menuLabel'
								style='margin-top: 4px; float: left; margin-top: 10px;'>Scalars</div>
							<div id='scalars-mesh' style='width: 160px; float: left;'>

								<select id='scalars-selector' style='margin-left: 6px'><option>Scalars
										1</option></select> <input type='hidden' class='color-picker black'
									id='scalarsMinColor' size='6' value='#00ff00' /> <input
									type='hidden' id='scalarsMaxColor' class='color-picker black'
									size='6' value='#ff0000' />
							</div>



							<div class='menuLabel' style='margin-top: 4px; float: left;'>Scalars
								Threshold</div>
							<div id='threshold-scalars'
								style='margin-left: 10px; margin-top: 4px; float: left;'></div>

						</div>

					</div>
				</div></li>

			<li id='fibers' class='navigationLi'><div class='menu'>
					<div class='pin'>
						<span class='ui-icon ui-icon-pin-w pinicon'></span>
					</div>
					<div class='tabbox idTabs'>
						<div class='caption'>FIBERS</div>

						<a class='fiberstabs selected'>Fibers 1</a>

						<div id='fibers1' class='tabContent'>

							<div id='visibility-fibers'
								style='width: 140px; float: left; margin-top: 2px;'>
								<div class='menuLabel' style='margin-top: 4px; float: left;'>Show/Hide</div>
								<div id='fibersvisibility' class='eye show-icon'
									style='margin-left: 6px;'></div>
							</div>

							<div class='menuLabel' style='margin-top: 4px; float: left;'>Fiber
								Length Threshold</div>
							<div id='threshold-fibers'
								style='margin-left: 10px; margin-top: 4px; float: left;'></div>


						</div>

					</div>
				</div></li>

		</ul>



		<!--  The renderers. -->

		<div id='3d' class='threeDRenderer'></div>
    <div id='sliceAx' class='twoDRenderer'>
      <div id='blue_slider'></div>
      <div id='ax_right_label' class='left_annotation'>R</div>
      <div id='ax_left_label' class='right_annotation'>L</div>
      <div id='ax_top_label' class='top_annotation'>A</div>
      <div id='ax_bottom_label' class='bottom_annotation'>P</div>
    </div>
		<div id='sliceSag' class='twoDRenderer'>
			<div id='red_slider'></div>
      <div id='sag_right_label' class='right_annotation'>P</div>
      <div id='sag_left_label' class='left_annotation'>A</div>
      <div id='sag_top_label' class='top_annotation'>S</div>
      <div id='sag_bottom_label' class='bottom_annotation'>I</div>			
		</div>
		<div id='sliceCor' class='twoDRenderer'>
			<div id='green_slider'></div>
      <div id='cor_right_label' class='left_annotation'>R</div>
      <div id='cor_left_label' class='right_annotation'>L</div>
      <div id='cor_top_label' class='top_annotation'>S</div>
      <div id='cor_bottom_label' class='bottom_annotation'>I</div>			
		</div>


		<!-- Slice:Drop logo -->
		<div id='blacklogo'>
			<a href='{{url("")}}/http://slicedrop.com' target='_top'><img src='{{url("")}}/gfx/slicedrop_transparent.png' /></a>
		</div>

    <div id='share'>
      <img id='sharelogo' src='{{url("")}}/gfx/dropbox.png' title='Share with Dropbox'/>
      <div id='sharemsg' style='display:none'></div>
    </div>
    
    <div id='download'>
      <img id='linklogo' src='{{url("")}}/gfx/link.png' title='Realtime Collaboration'/>
      <img id='linkselectedlogo' style='display:none' src='{{url("")}}/gfx/link_selected.png' title='Stop Realtime Collaboration'/>
      <img id='downloadlogo' src='{{url("")}}/gfx/download.png' title='Download data'/>
    </div>
    
    <div id='log'></div>

	</div>
	<script type='text/javascript' src='{{url("")}}/js/x.rendering.js'></script>
</body>
</html>
