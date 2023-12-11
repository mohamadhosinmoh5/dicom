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


<!-- Brand new TRAKO support https://github.com/haehn/TRAKO! -->
<script type='text/javascript' src="js/draco/draco_decoder.js"></script>
<script type='text/javascript' src='{{url("")}}/js/xtkTrakoReader.js'></script> 


<script type='text/javascript' src='{{url("")}}/js/pusher.min.js'></script>

</head>
<body id='body' class='webgl_enabled'>
  <input type="hidden" id="token" value="{{csrf_token('')}}">
  <input type="hidden" id="baseUrl" value="{{url('/')}}">

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

	{{-- <script type='text/javascript' src='{{url("")}}/js/modules.js'></script> --}}
	<script type='text/javascript' src='{{url("")}}/js/x.rendering.js'></script>
	<script type="text/javascript">
		$(document).ready(function(){
			selectfiles("{{$_GET['path']}}",false);
		})
		</script>
</body>
</html>
