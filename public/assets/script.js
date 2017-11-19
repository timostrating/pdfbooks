// Our delete requests should be confirmed
function confirmAction(message, url) {
	if(confirm(message) == true) {
		document.location.href = url;
	}
}