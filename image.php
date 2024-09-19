<!DOCTYPE html>
<html>
<head>
	<title>Knockout File Bindings Demo</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/knockout-file-bindings.css">
	<style type="text/css"> 
</style>
</head>
<body>
	<div class="container">  
		<h3>ELANSA şəkil yükləmə</h3> 
		<div class="well" data-bind="fileDrag: multiFileData">
			<div class="form-group row">
				<div class="col-md-12">
					<input type="file" multiple data-bind="fileInput: multiFileData, customFileInput: {
						buttonClass: 'btn btn-success',
						fileNameClass: 'disabled form-control',
						onClear: onClear,
						onInvalidFileDrop: onInvalidFileDrop
					}" accept="image/*">
				</div>
				<div class="col-md-12 text-center">
					<!-- ko foreach: {data: multiFileData().dataURLArray, as: 'dataURL'} -->
					<img style="height: 100px; margin: 5px 15px;" class="img-rounded  thumb" data-bind="attr: { src: dataURL }, visible: dataURL" id="img">

					<button onClick="rotateImg()" id="rev">Cevir</button>
					<button  onclick="remove_image()" id="but">x</button>
					<!-- /ko --> 
				</div> 
			</div> 
		</div>
	</div> 
	<script src='assets/js/knockout-min.js'></script>
	<script src='assets/js/knockout-file-bindings.js'></script>
	 <script type="text/javascript">
	 	  let rotation = 0;
    function rotateImg() {
      rotation += 90; // add 90 degrees, you can change this as you want
      if (rotation === 360) { 
        // 360 means rotate back to 0
        rotation = 0;
      }
      document.querySelector("#img").style.transform = `rotate(${rotation}deg)`;
    }
	 </script>
	<script type="text/javascript">
		function remove_image(){
			document.getElementById('img').remove();
			document.getElementById('but').remove();
			document.getElementById('rev').remove();
		} 
	</script>
	<script>
		var viewModel = {};
		viewModel.fileData = ko.observable({
			dataURL: ko.observable(),
        // can add "fileTypes" observable here, and it will override the "accept" attribute on the file input
        // fileTypes: ko.observable('.xlsx,image/png,audio/*')
    });
		viewModel.multiFileData = ko.observable({ dataURLArray: ko.observableArray() });
		viewModel.onClear = function (fileData) {
			if (confirm('Are you sure?')) {
				fileData.clear && fileData.clear();
			}
		};
		viewModel.debug = function () {
			window.viewModel = viewModel;
			console.log(ko.toJSON(viewModel));
			console.log(viewModel.multiFileData())
			console.log(viewModel.multiFileData().dataURLArray());
			console.log(viewModel.multiFileData().fileArray());
			debugger;
		};
		viewModel.onInvalidFileDrop = function(failedFiles) {
			var fileNames = [];
			for (var i = 0; i < failedFiles.length; i++) {
				fileNames.push(failedFiles[i].name);
			}
			var message = 'Invalid file type: ' + fileNames.join(', ');
			alert(message)
			console.error(message);
		};
		ko.applyBindings(viewModel);
	</script>

</body>
</html>
