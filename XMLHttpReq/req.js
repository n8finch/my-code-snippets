// JSON

var request = new XMLHttpRequest();
request.open('GET', '/my/url', true);

request.onload = function() {


  // Get the container and clear the current conent...
  const container = document.getElementsByClassName('element-to-clear')[0];
  container.innerHTML = '';
  container.style.height = 'auto';

  // add the spinnner here...


  if (request.status >= 200 && request.status < 400) {
    // Success!
    var data = JSON.parse(request.responseText);

	//Can abscract this to a different function, e.g. processParsedData( data ); ...

		const html =
			`<div>Insert any content or ${vars} here.</div>`;

		//Clear the spinner
		container.innerHTML = '';

		//Insert the received data.
		container.insertAdjacentHTML('beforeend', html );

  } else {
    // We reached our target server, but it returned an error

  }
};

request.onerror = function() {
  // There was a connection error of some sort
};

request.send();



// Post
var request = new XMLHttpRequest();
request.open('POST', '/my/url', true);
request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
request.send(data);





// Request
var request = new XMLHttpRequest();
request.open('GET', '/my/url', true);

request.onload = function() {
  if (request.status >= 200 && request.status < 400) {
    // Success!
    var resp = request.responseText;
  } else {
    // We reached our target server, but it returned an error

  }
};

request.onerror = function() {
  // There was a connection error of some sort
};

request.send();
