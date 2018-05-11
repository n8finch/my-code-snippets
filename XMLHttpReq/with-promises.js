// https://gomakethings.com/promise-based-xhr/?mc_cid=a872ddd625&mc_eid=0acd8fdb9f
// See also
// https://github.com/cferdinandi/atomic
// https://cferdinandi.github.io/atomic/


/**
 * Step 1:
 * Creat a function that creates a new XHR and a new Promise
 */

var makeRequest = function (url, method) {

	// Create the XHR request
	var request = new XMLHttpRequest();

	// Return it as a Promise
	return new Promise(function (resolve, reject) {

		// Setup our listener to process compeleted requests
		request.onreadystatechange = function () {

			// Only run if the request is complete
			if (request.readyState !== 4) return;

			// Process the response
			if (request.status >= 200 && request.status < 300) {
				// If successful
				resolve(request);
			} else {
				// If failed
				reject({
					status: request.status,
					statusText: request.statusText
				});
			}

		};

		// Setup our HTTP request
		request.open(method || 'GET', url, true);

		// Send the request
		request.send();

	});
};

/**
 * Step 2a:
 * use it for a simple XHR with a Promise callback
 */
 makeRequest('https://some-url.com/posts')
 	.then(function (posts) {
 		console.log('Success!', posts);
 	})
 	.catch(function (error) {
 		console.log('Something went wrong', error);
 	});

/**
 * OR
 *
 * Step 2b:
 * Make multiple API calls, passing the result from the first call into the second
 */

 makeRequest('https://some-url.com/posts')
 	.then(function (posts) {
 		return makeRequest('https://some-url.com/post/' + posts[0].id);
 	})
 	.then(function (post) {
 		return {
 			title: post.title.toUpperCase(),
 			content: post.body,
 			date: post.date
 		}
 	})
 	.then(function (postData) {
 		renderPost(postData);
 	})
 	.catch(function (error) {
 		console.log('Something went wrong', error);
 	});
