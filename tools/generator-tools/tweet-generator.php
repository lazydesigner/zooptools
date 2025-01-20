<?php 
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/routes.php')
? $_SERVER['DOCUMENT_ROOT'] . '/routes.php'
: $_SERVER['DOCUMENT_ROOT'] . '/zoop/routes.php';
$canonical = 'fake-tweet-generator';
ob_start(); ?>
<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <style>
    main{display:flex}footer,main{padding:32px 16px}footer .foot{text-align:center}*{margin:0;padding:0;box-sizing:border-box}a{text-decoration:none;font:inherit;color:inherit}.bar{height:8px;background-color:#1da1f2;background:linear-gradient(to right,#00c6ff,#0072ff)}main{flex:1;max-width:1024px;width:100%;margin:auto;align-items:flex-start}main .form{background-color:#fff;border:1px solid #dde7ef;border-radius:8px;padding:24px;flex:1}main .form h2{font-size:22px;font-weight:500;margin-bottom:32px}main .form .form-control{margin-bottom:24px}main .form .form-control:last-child{margin-bottom:2px}main .form .form-control label{display:block;font-weight:500}main .form .form-control input,main .form .form-control textarea{display:block;font:inherit;width:100%;padding:10px 14px;margin:4px 0;border:1px solid #cbd5e1;border-radius:6px;outline:0;transition:border-color .2s ease-in}main .form .form-control input:focus,main .form .form-control textarea:focus{border-color:#1da1f2}main .form .form-control input::placeholder,main .form .form-control textarea::placeholder{color:#9ca1a5}main .form .form-control textarea{resize:vertical}main .form .form-control small{font-size:13px;color:#8c9094}main .form .form-control .username_input{display:block;background-color:#fff;color:#8c9094;font:inherit;width:100%;padding:0 14px;margin:4px 0;border:1px solid #cbd5e1;border-radius:6px;outline:0;transition:border-color .2s ease-in,color .2s ease-in;display:flex;align-items:center}main .form .form-control .username_input:focus-within{border-color:#1da1f2;color:#0f1419}main .form .form-control .username_input::placeholder{color:#9ca1a5}main .form .form-control .username_input input{display:inline;margin:0 0 0 2px;padding:10px 0;border:none}main .form .form-control input[type=radio]{display:inline;width:fit-content}main .form .form-control input[type=radio]+label{display:inline}main .form .form-control p{font-weight:500}main .form .form-control .group{margin-top:10px;display:flex}main .form .form-control .group .radio_container{display:block;position:relative;padding-left:22px;margin-right:20px;cursor:pointer;font-size:16px;font-weight:400;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}main .form .form-control .group .radio_container input{position:absolute;opacity:0;cursor:pointer;height:0;width:0}main .form .form-control .group .radio_mark{position:absolute;top:1px;left:0;height:16px;width:16px;border:1px solid #aab8c2;border-radius:50%;background-color:#fff}main .form .form-control .group .radio_container input:focus~.radio_mark{box-shadow:0 0 0 3px rgba(29,161,242,.4)}main .form .form-control .group .radio_container input:checked~.radio_mark{background-color:#FF6600;border-color:#FF6600}main .form .form-control .group .radio_mark:after{content:"";position:absolute;display:none}main .form .form-control .group .radio_container input:checked~.radio_mark:after,main .form .form-control.upload .file-name.show{display:block}main .form .form-control .group .radio_container .radio_mark:after{top:3px;left:3px;width:8px;height:8px;border-radius:50%;background:#fff}main .form .form-control.upload{margin-bottom:42px;display:flex;position:relative}main .form .form-control.upload label{display:inline-block;position:relative;border-radius:99px;background-color:#FF6600;color:#fff;font-weight:400;padding:10px 20px;cursor:pointer;font-size:smaller;text-wrap:nowrap}main .form .form-control.upload .file{opacity:0;width:0;height:0;position:absolute;top:0;left:0;cursor:pointer;z-index:-10}main .form .form-control.upload .file-name{font-size:12px;font-weight:400;position:absolute;bottom:-29px;background-color:#eef3f7;color:#0f1419;border-radius:99px;padding:4px 16px;display:none}main .form .form-control.upload .reset{border:1px solid #FF6600;border-radius:99px;background-color:#fff;color:#FF6600;font:inherit;cursor:pointer;padding:10px 20px;margin-left:12px;font-size:smaller}@media (max-width:890px){main .form{width:75%;margin:0 auto}}@media (max-width:700px){main .form{width:85%;margin:0 auto}}@media (max-width:640px){main .form{width:95%;margin:0 auto;background-color:transparent!important}}main .tweet-desk{background-color:#fff;border:1px solid #dde7ef;border-radius:8px;padding:24px;margin-left:16px;position:sticky;top:16px;z-index:10}main .tweet-desk h2{font-size:22px;font-weight:500}main .tweet-desk .tweet_box{border:1px solid #eff3f4;background-color:#fff;margin:32px 0 34px;width:440px}main .tweet-desk .tweet_box.dim{border:1px solid #15202b;background-color:#15202b}main .tweet-desk .tweet_box.dark{border:1px solid #000;background-color:#000}@media (max-width:940px){main .tweet-desk .tweet_box{width:400px}}main .tweet-desk .tweet{border:1px solid transparent;background-color:#fff;padding:0 16px;font-size:15px;width:100%;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}main .tweet-desk .tweet .head{padding-top:12px;display:flex;justify-content:space-between}main .tweet-desk .tweet .head .title{display:flex;align-items:center}main .tweet-desk .tweet .head .title img{display:inline-block;border-radius:50%;margin-right:12px}main .tweet-desk .tweet .head .title .text .top{font-weight:700;display:flex;align-items:center}main .tweet-desk .tweet .head .title .text .top .tweet_name{margin-right:2px}main .tweet-desk .tweet .head .title .text .top .verified{font-weight:400;color:#1da1f2}main .tweet-desk .tweet .head .title .text .top .verified.hide,main .tweet-desk .tweet .stats .stat.hide{display:none}main .tweet-desk .tweet .head .dots,main .tweet-desk .tweet .head .title .text .bottom,main .tweet-desk .tweet .tail svg{color:#536471}main .tweet-desk .tweet .content .message{padding-top:16px;font-size:23px}main .tweet-desk .tweet .content .message .highlight,main .tweet-desk .tweet.dark .content .tweet_info .tweet_client,main .tweet-desk .tweet.dim .content .tweet_info .tweet_client{color:#1b95e0}main .tweet-desk .tweet .content .tweet_info{color:#536471;padding:16px 0;display:flex}main .tweet-desk .tweet .stats{border-top:1px solid #eff3f4;color:#536471;padding:16px 4px;display:flex;flex-wrap:wrap}main .tweet-desk .tweet .stats .stat{margin-right:24px}main .tweet-desk .tweet .stats .stat .count{font-weight:700;color:#0f1419}@media (max-width:520px){main .form{background-color:#f7f8f9;width:100%;margin:0 auto;box-shadow:none;border:none;border-radius:0;padding:24px 0}main .tweet-desk .tweet .stats .stat{margin-right:12px}}main .tweet-desk .tweet .tail{border-top:1px solid #eff3f4;padding:12px 0;display:flex;justify-content:space-around}main .tweet-desk .tweet.dim{background-color:#15202b;color:#fff}main .tweet-desk .tweet.dim .head .title .text .top .verified,main .tweet-desk .tweet.dim .stats .stat .count{color:#fff}main .tweet-desk .tweet.dim .content .tweet_info,main .tweet-desk .tweet.dim .head .title .text .bottom,main .tweet-desk .tweet.dim .head .title .text .dots,main .tweet-desk .tweet.dim .tail svg{color:#798a96}main .tweet-desk .tweet.dim .stats{border-top:1px solid #38444d;color:#798a96}main .tweet-desk .tweet.dim .tail{border-top:1px solid #38444d}main .tweet-desk .tweet.dark{background-color:#000;color:#d9d9d9}main .tweet-desk .tweet.dark .head .title .text .top .verified,main .tweet-desk .tweet.dark .stats .stat .count{color:#d9d9d9}main .tweet-desk .tweet.dark .content .tweet_info,main .tweet-desk .tweet.dark .head .title .text .bottom,main .tweet-desk .tweet.dark .head .title .text .dots,main .tweet-desk .tweet.dark .tail svg{color:#6e767d}main .tweet-desk .tweet.dark .stats{border-top:1px solid #2f3336;color:#6e767d}main .tweet-desk .tweet.dark .tail{border-top:1px solid #2f3336}@media (max-width:395px){main .tweet-desk .tweet{font-size:14px}main .tweet-desk .tweet .content .message{font-size:21px}main .tweet-desk .tweet .stats{padding:16px 0}main .tweet-desk .tweet .stats .stat{margin-right:8px}}main .tweet-desk .btn{display:block;border:none;border-radius:99px;background-color:#FF6600;color:#fff;font:inherit;margin:auto;padding:11px 33px;cursor:pointer}@media (max-width:890px){main .tweet-desk .tweet_box{max-width:440px;width:100%;margin:32px auto}main .tweet-desk{width:75%;margin:0 auto 16px;position:static}main{flex-direction:column-reverse}}@media (max-width:700px){main .tweet-desk{width:85%;margin:0 auto 16px}}@media (max-width:640px){main .tweet-desk{width:95%;margin:0 auto 16px}}@media (max-width:520px){main .tweet-desk{background-color:#f7f8f9;width:100%;margin:0 auto 16px;box-shadow:none;border:none;border-radius:0;padding:24px 0}main{padding:16px}}footer{font-size:14px;font-weight:400;color:#6e8698;display:flex;justify-content:center;align-items:center}footer .foot a{border-bottom:1px dotted #6e8698}@media (hover:hover){main .form .form-control.upload .reset,main .form .form-control.upload label,main .tweet-desk .btn{transition:background .2s ease-in}main .form .form-control.upload label:hover,main .tweet-desk .btn:hover{background-color:#e05b02}main .form .form-control.upload .reset:hover{background-color:#e6e8eb}footer .foot a:hover{border-bottom-style:solid}}@media (hover:none){main .form .form-control.upload label:active,main .tweet-desk .btn:active{background-color:#FF6600}main .form .form-control.upload .reset:active{background-color:#e6e8eb}footer .foot a:active{border-bottom-style:solid}}footer .dot{width:3px;height:3px;background-color:#6e8698;border-radius:50%;margin:0 6px}
    </style>
<?php $style = ob_get_clean();

ob_start();
?>
<div class="" style="max-width:800; margin: auto;padding:2%">
<main>
      <div class="form">
        <h2>Details</h2>
        <div class="form-control upload">
          <label for="avatar"
            >Upload Profile Picture<input
              type="file"
              class="file"
              id="avatar"
              name="avatar"
              accept="image/png, image/jpeg"
          /></label>
          <p id="file-name" class="file-name"></p>
          <button id="reset" class="reset" type="button">Reset</button>
        </div>
        <div class="form-control">
          <label for="name">Name</label>
          <input type="text" id="name" />
          <small><span class="count">0</span>/50 characters</small>
        </div>
        <div class="form-control">
          <label for="username">Username</label>
          <div class="username_input">@<input type="text" id="username" /></div>
          <small
            ><span class="count">0</span>/15 characters. Only numbers, letters
            or _ characters</small
          >
        </div>
        <div class="form-control">
          <label for="message">Message</label>
          <textarea id="message" rows="3"></textarea>
          <small><span class="count">0</span>/280 characters</small>
        </div>
        <div class="form-control">
          <label for="time">Time</label>
          <input type="text" id="time" />
          <small>hh:mm format</small>
        </div>
        <div class="form-control">
          <label for="date">Date</label>
          <input type="text" id="date" />
          <small>mmm dd, yyyy format</small>
        </div>
        <div class="form-control">
          <label for="client">Client</label>
          <input type="text" id="client" />
          <small
            >Twitter for iPhone, Twitter for Android, Twitter Web App,
            etc.</small
          >
        </div>
        <div class="form-control">
          <label for="retweets">Retweets Count</label>
          <input type="number" id="retweets" />
        </div>
        <div class="form-control">
          <label for="quotes">Quote Tweets Count</label>
          <input type="number" id="quotes" />
        </div>
        <div class="form-control">
          <label for="likes">Likes Count</label>
          <input type="number" id="likes" />
        </div>
        <div class="form-control">
          <p>Theme</p>
          <div class="group">
            <label class="radio_container"
              >Light
              <input
                type="radio"
                name="theme_radio"
                value="light"
                checked="checked"
              />
              <span class="radio_mark"></span>
            </label>
            <label class="radio_container"
              >Dim
              <input type="radio" name="theme_radio" value="dim" />
              <span class="radio_mark"></span>
            </label>
            <label class="radio_container"
              >Dark
              <input type="radio" name="theme_radio" value="dark" />
              <span class="radio_mark"></span>
            </label>
          </div>
        </div>
        <div class="form-control">
          <p>Verified Badge</p>
          <div class="group">
            <label class="radio_container"
              >Show
              <input type="radio" name="verified_radio" value="show" />
              <span class="radio_mark"></span>
            </label>
            <label class="radio_container"
              >Hide
              <input
                type="radio"
                name="verified_radio"
                value="hide"
                checked="checked"
              />
              <span class="radio_mark"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="tweet-desk">
        <h2>Preview</h2>
        <div id="tweet_box" class="tweet_box">
          <div id="tweet" class="tweet">
            <div class="head">
              <div class="title">
                <img
                  id="tweet_avatar"
                  src="data:image/jpeg;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAHa0lEQVR4XtVbCXMURRT+JruQDSEHZ4hAiARIcSggKDcFKJcxIpdBQLEKSn+TIlVyiGACFIYjQHEUAoIGEZVEkC0wgCFASLIbYIPZXatndpM5eqZfz0wCdlEFtfP6fe99/br79etGqa0LJ9HrjUEq6h94QSf3T+Fx/FREBBgx7BX1Ood2gEJSjD4ICaA7ZibnJSZLR5KPBNCpshsk7XfTCHmcJSKrXggBIqO0hYHR0fNNqa27mewtME/uCOe2WDtPxUsaAWJn5CTMu053hNEIcGKfS6t14hrERKMp+i7nvaM0jQAfAf1RlR5B72uFDQHeFZsd7cVBNUE7+6IRwJKypLekTEP1l7hu0vzVq2fIeQqQhk1gHEmHPxPDnFpToN2tASTNWkDwRXtuRJ2o/N9tgyKezd8VNY/UJ1C67c4mo5SPAJFVgmhuftyK8O0GND1sxtNnMVW6X1YIBUMGoaS4CIMG5nucD8ToSvmhXK4LJ9MnUo++2RrOAH79ox6Xr15DPB53dDAQCGDa5ImYMmk8MhTiwuzBcEEEmNjUA1njj2vtk6fPUFV9DLFYh9TIhkKZWFO+FNn9sqT6GVZ4wkHKSIAHJnnAkWg79h44gkQiiWSq/tEtZwUzB2+GoqBi5bvIzenvmgRRR/k1QKQx9b0zHsf2PQfQ2ckPeduZqv+QBIJ9Ati0biWCgQARmbgGpLT1SAQw3YeOn8G9xiaO0fJhNrywAOVLFvCrZ/LqDDb1SAS0tkaw5+DR1Ibk1kJjv4oPliM/L5cYBXox53ODzwRoYN/XnEJj08N0kImXIkLUFhYMwfvLFrkgwLkLlwDRmDnl6PFEAl/trDSgEvwjObbl47UIZGRwZN0j+BwBwN3GJhw+fobkkFjIOBRlSxZgRGGBuJuEhO8EnD53CTfCtyVMoIuOKynGwrkzdB0c6v12qa/pd98J+Hb/EUSiUbpXEpIsH/hoVRm5h2gqM0Vd9QBPNzQ6k7btqgLLAbxf+1j9ZLnA5o1r+ARQvOVtyqKbIVu6bQC/2L6XPEKOgmrqaL03+3xTRaqboNIj3ntUPT4URLrdiMcT2LqrCuxY6kfjubhl41oEArydgCHK7wa+rgGdnZ3YtmsfJ++3oYNkr/GUv3nDagSDQTG/xCmh1NaHtdsocyMq0HdLE0C/1BEfiMxm6QlwYaIW9rrp4T4COOi8JKjLAdJoiwfWLhlySs6ctLonwGa+fbnjOyS7SiwcaBERDt8VRcFnn3woZklCwgMBfJRvqqrR/uSphAl00f7Z/bBhzXv+PK5IwUoSIBo+4GLtVVy99ifdKwnJyZNKMXPaFH4PlwuCXEmMYOyzWAw79h4kSMpZzKjfVLECWaGQQbecFs5aT0mEZEGOnz6PWw133WzLtsS9WjQCSxbOIRArEFGvwLpL5/QpYGKBR4r6mwK1Bri7qhqsICrX+FSzwuj61eXIYGVin5stAbYOEg1IJBKoPnYG9x+kCyO6juKlpEt42NAhKF+6ABncOgDRGIcQpkcAEcss9qi5BRd+voL7Dx45b4+6jmy7GzZ0MGa/ORWDBw1wiWzTzRzJvDXAQpjsImCDze4GWiNRsHI5+7d2agT6BALIDGWq5e/83BywOwGp5sG+Ho8AoyP82Pdgv6beooA+x+QIUIHoyu1G0ZvDHHwPCu0J8KBUKnxfiLDu1piSB3TZ6JEUFjwsUWppbUNbJIpYx3NVdSizL/JyczAgPw9ZoUywRdDcPELb0mx5J8iwnc4ysmHNboP/Cjfgt/rraG2LCHYCBQyfXYC8PqEUY0cXgd0W+9Y4LJqmgPf5nTY21tGBsxdqcfvOPfL2Zxl1RUHxyOGYP2u6/M5AZE1uEXSMS408dhQ+f+kXXLt+07lAJcn1xNIxmDPjDW16+DgffKwJJtEWacf+wyfw/Pm/zvxLOp9W1rdvH6wqW6yuF341bxGgWqF5c/NWA06e/dGDXanFh5Duvz1vFsaMLhJgme7Zbep0PhAA/F5/Axd+uiLtvG0g8D6Yfpv91lS8Nn6cNKZlFkttgxw4dg3GrsO8N/mJvWjuDIwtKZaETjOp/a1GgDy0hslefFVWH1P/TYhcSUPTWp1L1uwdkZeXZa6nALsE+XrPfvknMAQaZNbIYDCAT9etcrgssQdkg+aSgCRqTp3D33f+IbhjErHzzvC7U0xav40a+QqWLZpHtkWvIUUAnXO2DTe3tKHyYA0Z0KugxTqOuWtXLMPA/DxpKFcRwJ6+tUSiPTTvzRHDvyTVSzE+BuTmqE/qZJs0AaygwQh4GZv8Q6qk/Bpw9ORZNNxt5Fd86TNJl0L5R2XR8EIsf2e+hEJJAliev3VnpevDDdcySdKcvGPnBHZ3yF6YUpvUIvjg0WMcOHzCxS081RyrnCw/K8sWY+jggRxAm3KcUyZo3nB+uFiLuuth99547UlgY0JpCebNnE5GkloEd+87hGj7ky7lBHvIhjBBs75Uskp87KJB5WRnY716gUprjgQYIkCB+gCSZYCW5jcTBgDr/wNxco09n9miPqSirQP/AZuVIO27Pg3WAAAAAElFTkSuQmCC"
                  alt="avatar"
                  width="48"
                  height="48"
                />
                <div class="text">
                  <div class="top">
                    <span class="tweet_name" id="tweet_name">Name</span>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      id="tweet_verified"
                      class="verified hide"
                      width="18"
                      height="18"
                      viewBox="0 0 24 24"
                      fill="currentColor"
                    >
                      <g>
                        <path
                          d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"
                        ></path>
                      </g>
                    </svg>
                  </div>
                  <div class="bottom">
                    @<span id="tweet_username">username</span>
                  </div>
                </div>
              </div>
              <div class="dots">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="19"
                  height="19"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                >
                  <g>
                    <circle cx="5" cy="12" r="2"></circle>
                    <circle cx="12" cy="12" r="2"></circle>
                    <circle cx="19" cy="12" r="2"></circle>
                  </g>
                </svg>
              </div>
            </div>
            <div class="content">
              <div id="tweet_message" class="message">
                Generate convincing fake tweet images
              </div>
              <div class="tweet_info">
                <div id="tweet_time">4:38 PM</div>
                &nbsp;&centerdot;&nbsp;
                <div id="tweet_date">Jul 7, 2021</div>
                &nbsp;&centerdot;&nbsp;
                <div id="tweet_client" class="tweet_client">
                  Twitter Web App
                </div>
              </div>
            </div>
            <div class="stats">
              <div class="stat">
                <span id="tweet_retweets" class="count">96</span> Retweets
              </div>
              <div class="stat">
                <span id="tweet_quotes" class="count">88</span> Quote Tweets
              </div>
              <div class="stat">
                <span id="tweet_likes" class="count">153</span> Likes
              </div>
            </div>
            <div class="tail">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <g>
                  <path
                    d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"
                  ></path>
                </g>
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <g>
                  <path
                    d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"
                  ></path>
                </g>
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <g>
                  <path
                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"
                  ></path>
                </g>
              </svg>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="22"
                height="22"
                viewBox="0 0 24 24"
                fill="currentColor"
              >
                <g>
                  <path
                    d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z"
                  ></path>
                  <path
                    d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z"
                  ></path>
                </g>
              </svg>
            </div>
          </div>
        </div>
        <button id="download" class="btn" type="button">Download</button>
      </div>
    </main>
</div>
<?php $tool_container = ob_get_clean(); ob_start();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
    const avatar=document.getElementById("avatar"),fileName=document.getElementById("file-name"),reset=document.getElementById("reset"),fullname=document.getElementById("name"),username=document.getElementById("username"),message=document.getElementById("message"),time=document.getElementById("time"),date=document.getElementById("date"),client=document.getElementById("client"),retweets=document.getElementById("retweets"),quotes=document.getElementById("quotes"),likes=document.getElementById("likes"),themeRadios=document.getElementsByName("theme_radio"),verifiedRadios=document.getElementsByName("verified_radio"),tweetBox=document.getElementById("tweet_box"),tweet=document.getElementById("tweet"),tweetAvatar=document.getElementById("tweet_avatar"),tweetName=document.getElementById("tweet_name"),tweetVerified=document.getElementById("tweet_verified"),tweetUsername=document.getElementById("tweet_username"),tweetMessage=document.getElementById("tweet_message"),tweetTime=document.getElementById("tweet_time"),tweetDate=document.getElementById("tweet_date"),tweetClient=document.getElementById("tweet_client"),tweetRetweets=document.getElementById("tweet_retweets"),tweetQuotes=document.getElementById("tweet_quotes"),tweetLikes=document.getElementById("tweet_likes"),download=document.getElementById("download"),MONTHS=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec",];let themeColor="#ffffff";function numberFormatter(e,t){if(null===e)return null;if(0===e)return"0";t=!t||t<0?0:t;let n=e.toPrecision(2).split("e"),r=1===n.length?0:Math.floor(Math.min(n[1].slice(1),14)/3),a=r<1?e.toFixed(0+t):(e/Math.pow(10,3*r)).toFixed(1+t);return(a<0?a:Math.abs(a))+["","K","M","B","T"][r]}function showFileName(e){fileName.classList.add("show"),fileName.innerText=e}function renderProfilePicture(){let[e]=avatar.files;e&&(showFileName(e.name),tweetAvatar.src=URL.createObjectURL(e))}function resetProfilePicture(){fileName.innerText="",fileName.classList.remove("show"),tweetAvatar.src="assets/silhoutte.png"}function renderName(){let e=fullname.value.trim();""===e?tweetName.innerText="Name":tweetName.innerText=e;let t=fullname.nextElementSibling.querySelector(".count");t.innerText=e.length}function renderUsername(){let e=username.value.trim();""===e?tweetUsername.innerText="username":tweetUsername.innerText=e;let t=username.parentElement.nextElementSibling.querySelector(".count");t.innerText=e.length}function renderMessage(){let e=message.value.trim();""===e?tweetMessage.innerText="Generate convincing fake tweet images":(tweetMessage.innerText="",e.split(" ").forEach(e=>{if(e.match(/^@(\w){1,20}$/)){let t=document.createElement("span");t.className="highlight",t.innerText=e,tweetMessage.append(t),tweetMessage.append(" ")}else if(e.match(/^@(\w){21,}$/)){let n=document.createElement("span");n.className="highlight",n.innerText=e.slice(0,21),tweetMessage.append(n),tweetMessage.append(e.slice(21)),tweetMessage.append(" ")}else if(e.match(/^@\w+/)){let r=document.createElement("span");r.className="highlight",r.innerText=e.match(/^@\w+/),tweetMessage.append(r),tweetMessage.append(e.match(/(?<=\w)\W+/)),tweetMessage.append(" ")}else tweetMessage.append(e),tweetMessage.append(" ")}),tweetMessage.innerHTML=tweetMessage.innerHTML.replace(/\n/g,"<br>\n"));let t=message.nextElementSibling.querySelector(".count");t.innerText=e.length}function renderTime(){let e=time.value.trim();""===e?tweetTime.innerText=getCurrentTime():tweetTime.innerText=e}function renderDate(){let e=date.value.trim();""===e?tweetDate.innerText=getCurrentDate():tweetDate.innerText=e}function renderClient(){let e=client.value.trim();""===e?tweetClient.innerText="Twitter Web App":tweetClient.innerText=e}function renderRetweets(){tweetRetweets.parentElement.classList.remove("hide");let e=retweets.value;""===e?tweetRetweets.innerText="96":(e=+e)>=0?0===e?tweetRetweets.parentElement.classList.add("hide"):tweetRetweets.innerText=numberFormatter(e):tweetRetweets.innerText="96"}function renderQuotes(){tweetQuotes.parentElement.classList.remove("hide");let e=quotes.value;""===e?tweetQuotes.innerText="88":(e=+e)>=0?0===e?tweetQuotes.parentElement.classList.add("hide"):tweetQuotes.innerText=numberFormatter(e):tweetQuotes.innerText="88"}function renderLikes(){tweetLikes.parentElement.classList.remove("hide");let e=likes.value;""===e?tweetLikes.innerText="153":(e=+e)>=0?0===e?tweetLikes.parentElement.classList.add("hide"):tweetLikes.innerText=numberFormatter(e):tweetLikes.innerText="153"}function getCurrentTime(){let e=new Date,t=+e.getHours(),n=("00"+e.getMinutes()).slice(-2),r;return t>12?(t-=12,r="PM"):0===t?(t=12,r="AM"):r=12===t?"PM":"AM",`${t}:${n} ${r}`}function getCurrentDate(){let e=new Date,t=e.getDate(),n=e.getMonth(),r=e.getFullYear();return`${MONTHS[n]} ${t}, ${r}`}function toggleTheme(e){let t;for(let n=0;n<themeRadios.length;n++)themeRadios[n].checked&&(t=themeRadios[n].value);"dim"===t?(tweet.className="tweet dim",tweetBox.className="tweet_box dim",themeColor="#15202b"):"dark"===t?(tweet.className="tweet dark",tweetBox.className="tweet_box dark",themeColor="#000000"):(tweet.className="tweet",tweetBox.className="tweet_box",themeColor="#ffffff")}function toggleVerified(){let e;for(let t=0;t<verifiedRadios.length;t++)verifiedRadios[t].checked&&(e=verifiedRadios[t].value);"show"===e?tweetVerified.classList.remove("hide"):tweetVerified.classList.add("hide")}function generateFileName(){return`tweet${Math.floor(9e4*Math.random())+1e4}`}function saveAs(e,t){let n=document.createElement("a");"string"==typeof n.download?(n.href=e,n.download=t,document.body.appendChild(n),n.click(),document.body.removeChild(n)):window.open(e)}function takeScreenshot(){window.scrollTo(0,0),html2canvas(document.querySelector(".tweet"),{allowTaint:!0,backgroundColor:themeColor,useCORS:!0,scrollX:-window.scrollX,scrollY:-window.scrollY,windowWidth:document.documentElement.offsetWidth,windowHeight:document.documentElement.offsetHeight}).then(e=>{saveAs(e.toDataURL(),generateFileName())})}function setTimestamp(){renderTime(),renderDate()}setTimestamp(),avatar.addEventListener("change",renderProfilePicture),reset.addEventListener("click",resetProfilePicture),fullname.addEventListener("input",renderName),username.addEventListener("input",renderUsername),message.addEventListener("input",renderMessage),time.addEventListener("input",renderTime),date.addEventListener("input",renderDate),client.addEventListener("input",renderClient),retweets.addEventListener("input",renderRetweets),quotes.addEventListener("input",renderQuotes),likes.addEventListener("input",renderLikes),download.addEventListener("click",takeScreenshot);for(let i=0;i<themeRadios.length;i++)themeRadios[i].addEventListener("change",toggleTheme);for(let i=0;i<verifiedRadios.length;i++)verifiedRadios[i].addEventListener("change",toggleVerified);
      </script>
<?php $script = ob_get_clean();
include_once file_exists($_SERVER['DOCUMENT_ROOT'] . '/inc/base.php')
    ? $_SERVER['DOCUMENT_ROOT'] . '/inc/base.php'
    : $_SERVER['DOCUMENT_ROOT'] . '/zoop/inc/base.php';
?>