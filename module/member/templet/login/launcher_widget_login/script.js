function SetBackgroundText(object,isShow) {
	if (document.forms["OutLoginportal"] && document.forms["OutLoginportal"].user_id) {
		if (object === undefined) {
			if (document.forms["OutLoginportal"].user_id.value) {
				document.forms["OutLoginportal"].user_id.style.backgroundPosition = "5px 22px";
			}
			
			if (document.forms["OutLoginportal"].password.value) {
				document.forms["OutLoginportal"].password.style.backgroundPosition = "5px 22px";
			}
		} else {
			if (isShow == true) {
				if (!object.value) object.style.backgroundPosition = "5px 4px";
			} else {
				object.style.backgroundPosition = "5px 22px";
			}
		}
	}
}

function SecurityStep(step) {
	document.getElementById("sButton").className = "securityButton step"+step;
	document.getElementById("sStep").innerHTML = step;
}

function SecurityIP(object) {
	if (object.className == "ipon") {
		object.className = "ipoff";
		object.innerHTML = "OFF";
	} else {
		object.className = "ipon";
		object.innerHTML = "ON";
	}
}