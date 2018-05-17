$('document').ready(function() {
	$('#searchInput').keyup(function(){
		var textQuery=$('#searchInput').val();
		textQuery = textQuery.trim();
		if (textQuery.length < 1){
			$("#suggestions").empty();
			return null
		}
		$.ajax({
			url : 'autocomplete/',
			data : {
				'inp' : textQuery
			},
			success : function(data){
				var results = JSON.parse(data);
				$("#suggestions").empty();
				results.forEach(function(result){
					$("#suggestions").append('<li>'+result["name"]+'</li>')
				});
			}
		});
	});
	$('#searchForm').submit(function(event){
		event.preventDefault();
		// $("#sidenavbar").show();
		$("#myCarousel").hide();
		var textQuery=$('#searchInput').val();
		textQuery = textQuery.trim();
		if (textQuery.length < 1){
			return null
		}
		$.ajax({
			url : 'search/',
			data : {
				'inp' : textQuery
			},
			success : function(data){
				var results = JSON.parse(data);
				$("#suggestions").empty();
				results.forEach(function(result){
					var videosrc = result['video'];
					var videodesc = result['description'];
					var videocat = result['category'];
					var videoname = result['name'];
					$("#target").append('<a href="'+encodeURIComponent(videosrc)+'">'+videoname+'</a>')
				});
			}
		});
	})
})