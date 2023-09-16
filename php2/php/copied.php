<!DOCTYPE html>
<html>
<head>
    <title>$_SERVER</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 20%;
            left: 20%;
            transform: translate(-50%, -50%);
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.5s;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3">PHP $_SERVER Super Global Array</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Element/Code</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><code class="clickable">$_SERVER['PHP_SELF']</code></td>
                <td>Returns the filename of the currently executing script</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['GATEWAY_INTERFACE']</code></td>
                <td>Returns the version of the Common Gateway Interface (CGI) the server is using</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SERVER_ADDR']</code></td>
                <td>Returns the IP address of the host server</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SERVER_NAME']</code></td>
                <td>Returns the name of the host server (such as www.w3schools.com)</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SERVER_SOFTWARE']</code></td>
                <td>Returns the server identification string (such as Apache/2.2.24)</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SERVER_PROTOCOL']</code></td>
                <td>Returns the name and revision of the information protocol (such as HTTP/1.1)</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['REQUEST_METHOD']</code></td>
                <td>Returns the request method used to access the page (such as POST)</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['REQUEST_TIME']</code></td>
                <td>    Returns the timestamp of the start of the request (such as 1377687496)</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['QUERY_STRING']</code></td>
                <td>Returns the query string if the page is accessed via a query string</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['HTTP_ACCEPT']</code></td>
                <td>Returns the Accept header from the current request</td>
            </tr>
             <tr>
                <td><code class="clickable">$_SERVER['HTTP_ACCEPT_CHARSET']</code></td>
                <td>Returns the Accept_Charset header from the current request (such as utf-8,ISO-8859-1)</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['HTTP_HOST']</code></td>
                <td>Returns the Host header from the current request</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['HTTP_REFERER']</code></td>
                <td>Returns the complete URL of the current page (not reliable because not all user-agents support it)</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['HTTPS']</code></td>
                <td>Is the script queried through a secure HTTP protocol</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['REMOTE_ADDR']</code></td>
                <td>Returns the IP address from where the user is viewing the current page</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['REMOTE_HOST']</code></td>
                <td>Returns the Host name from where the user is viewing the current page</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['REMOTE_PORT']</code></td>
                <td>Returns the port being used on the user's machine to communicate with the web server</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SCRIPT_FILENAME']</code></td>
                <td>Returns the absolute pathname of the currently executing script</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SERVER_ADMIN']</code></td>
                <td>Returns the value given to the SERVER_ADMIN directive in the web server configuration file (if your script runs on a virtual host, it will be the value defined for that virtual host) (such as someone@w3schools.com)</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SERVER_PORT']</code></td>
                <td>Returns the port on the server machine being used by the web server for communication (such as 80)</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SERVER_SIGNATURE']</code></td>
                <td>Returns the server version and virtual host name which are added to server-generated pages</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['PATH_TRANSLATED']</code></td>
                <td>Returns the file system based path to the current script</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SCRIPT_NAME']</code></td>
                <td>Returns the path of the current script</td>
            </tr>
            <tr>
                <td><code class="clickable">$_SERVER['SCRIPT_URI']</code></td>
                <td>Returns the URI of the current page</td>
            </tr>
            <!-- Add the rest of the rows... -->
        </tbody>
    </table>
</div>

<div class="popup" id="popup">Copied!</div>

<script>
const clickableCodeElements = document.querySelectorAll('.clickable');

clickableCodeElements.forEach(element => {
    element.addEventListener('click', () => {
        const content = element.textContent;
        copyToClipboard(content);

        const popup = document.getElementById('popup');
        popup.style.display = 'block';
        setTimeout(() => {
            popup.style.opacity = '1';
        }, 10);

        setTimeout(() => {
            popup.style.opacity = '0';
            setTimeout(() => {
                popup.style.display = 'none';
            }, 500);
        }, 2000);
    });
});

function copyToClipboard(text) {
    const tempTextArea = document.createElement('textarea');
    tempTextArea.value = text;
    document.body.appendChild(tempTextArea);
    tempTextArea.select();
    document.execCommand('copy');
    document.body.removeChild(tempTextArea);
}
</script>

</body>
</html>
