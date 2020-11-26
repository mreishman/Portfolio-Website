window.onscroll = function() {scrollFunction()};

function scrollFunction()
{
	let bttButton = document.getElementById("bttButton");
	if (!bttButton) {
		return;
	}
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)
	{
		bttButton.style.display = "block";
	}
	else
	{
		bttButton.style.display = "none";
	}
}

function topFunction()
{
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}