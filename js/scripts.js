// <div id="target" class="row">
// <div class="col-xs-12 row result">
//   <div class="col-xs-4 videoplay">
//     <video height="90%">
//       <source src="videos/regex/1.mp4" alt="Example Video">
//     </video>
//   </div>
//   <div class="col-xs-8">
//     <h3>Video Title</h3>
//     <h6>This is the video description place holder</h6>
//   </div>
// </div>
//   </div>
var open =0
function openNav() {
  if (open == 0){
    document.getElementById("sidebar").style.width = "250px";

    open = 1
  }else{
    open = 0
    document.getElementById("sidebar").style.width = "0px";
    document.getElementById("main").style.marginLeft = "0px";
  }
}

function render(result) {
	video_link=result['video'];
	video_title=result['name'];
	video_desc=result['description'];
	video_id=result['id'];
	videodiv='<div class="col-xs-12 row result">\n\t<div class="col-xs-4 videoplay">\n\t\t<video height="90%">';
	videodiv+='\n\t\t\t<source src="'+video_link+'" alt="Constuctive Video">\n\t\t</video>';
	videodiv+='\n\t</div>\n\t<div class="col-xs-8">\n\t\t<a href="watch/?video='+video_id+'"><h3>'+video_title+'</h3></a>';
	videodiv+='\n\t\t<h6>'+video_desc+'</h6>\n\t</div>\n</div>';
	$("#target").append(videodiv);
}
$('document').ready(function() {
	$('#searchInput').keyup(function(){
		var textQuery=$('#searchInput').val();
		textQuery = textQuery.trim();
		if (textQuery.length < 1){
			$("#suggestions").empty();
			return null
		}
		$.ajax({
			url : '/vls/autocomplete/',
			data : {
				'inp' : textQuery
			},
			success : function(data){
				var results = JSON.parse(data);
				$("#suggestions").empty();
				results.forEach(function(result){
					$("#suggestions").append('<option value="'+result["name"]+'">')
				});
			}
		});
	});
	$('#searchForm').submit(function(event){
		event.preventDefault();
		$("#target").empty()
		var textQuery=$('#searchInput').val();
		$('#searchInput').val('');
		textQuery = textQuery.trim();
		if (textQuery.length < 1){
			return null
		};
		$.ajax({
			url : '/vls/search/',
			data : {
				'inp' : textQuery
			},
			success : function(data){
				var results = JSON.parse(data);
				$("#suggestions").empty();
				results.forEach(function(result){
					render(result);
					console.log(result)
				});
			}
		});
		$("#myCarousel").hide();
		$("#target").show();
	})
})