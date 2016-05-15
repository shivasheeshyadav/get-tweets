$(document).ready(function()
{
			$("form").submit(function(event)
			{
			event.preventDefault();
			//Scroll Function
			$('html,body').animate({scrollTop: $("#d3").offset().top},800);

			//Get tweets and Auto refresh of div
			loadtweet();
			setInterval(function(){loadtweet();},60000);
		});
			function loadtweet()
			{
				$("#nw2").html("");
				$.getJSON('data.php',{query:$("#query").val()},function(data)
					{
					$.each(data,function(main,sub)
					{
						$("#nw2").prepend(sub.html);
					});
				});	
			}
			

});