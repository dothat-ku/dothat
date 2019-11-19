<?php 
session_start();
if (!isset($_SESSION['username'])) {
		header('location: /');
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
}
define(GOLDEN_GATE, $_SESSION['username']);

$pic = array('data/image/Profile.jpg', 'data/image/lena.jpg', 'data/image/shh.jpg', 'data/image/sdp.jpg', 'data/image/ddt.jpg', 'data/image/kuku.jpg');

function resize_image($file, $percent) {
	$filename = $file;
	$percent = $percent;
	list($width, $height) = getimagesize($filename);
	$new_width = $width * $percent;
	$new_height = $height * $percent;
	$image_p = imagecreatetruecolor($new_width, $new_height);
	$image = imagecreatefromjpeg($filename);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	ob_start();
	imagejpeg($image_p, null, 50);
	printf('src="data:image/jpeg;base64,%s"', base64_encode(ob_get_clean()));
	imagedestroy($image_p);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>dothat | <?php echo GOLDEN_GATE; ?> </title>
	<script type="text/javascript" src="js/dothat.js"></script>
	<link rel="stylesheet" type="text/css" href="css/dothat.css">
	<meta name="viewport" content="width=device-width" />
	<meta name="theme-color" content="#ffffff" />
</head>
<body>
<header id="head_top" role="banner">
	<div class="flex_row_space_between margin_20">
		<div class="flex_midle_center" style="flex:auto;">
			<div class="flex_row_center">		
				<svg id	="logo_img" class="img_icon" height="40" viewBox="0 0 500 500" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M250 500C388.071 500 500 388.071 500 250C500 111.929 388.071 0 250 0C111.929 0 0 111.929 0 250C0 388.071 111.929 500 250 500ZM428.859 274.764C418.723 225.478 367.827 214.323 341.429 213.917C340.997 212.378 340.538 210.693 340.048 208.889L340.047 208.886C334.075 186.917 320.468 146.717 295.813 140.901C269.545 134.705 256.686 141.708 247.969 146.455C244.703 148.234 242.018 149.696 239.427 150.028C236.3 150.429 228.853 150.136 219.546 149.771C204.553 149.183 184.734 148.405 170.37 150.028C148.829 152.462 138.059 207.63 133.624 236.431C166.568 255.902 213.451 279.023 288.211 277.198C333.193 276.1 349.454 252.048 348.398 243.124C351.988 249.208 357.902 263.203 357.902 272.939C357.902 285.108 350.932 306.891 316.721 311.272C248.046 320.066 207.287 301.058 179.033 287.881L179.03 287.88L179.024 287.877L179.013 287.872C175.996 286.465 173.121 285.124 170.37 283.891C157.667 278.198 150.247 270.693 142.898 263.26C133.752 254.01 124.716 244.871 105.747 239.473C74.2419 230.508 44.9263 254.076 46.1935 274.764C47.3522 293.682 85.2724 296.171 116.518 294.843C148.769 293.473 173.177 308.279 201.326 325.354C202.871 326.29 204.421 327.235 205.981 328.185C239.108 348.365 276.359 371.058 342.063 372.727C411.754 369.685 438.531 321.785 428.859 274.764ZM279.73 152.227L280.322 152.796C281.939 154.349 284.454 154.474 286.217 153.088C288.305 151.448 288.525 148.366 286.692 146.445L286.125 145.852C284.457 144.104 281.708 143.979 279.888 145.568C277.891 147.311 277.818 150.391 279.73 152.227ZM299.403 167.101L299.807 167.983C301.766 172.259 307.805 172.357 309.901 168.147C310.952 166.037 310.568 163.495 308.94 161.79L308.271 161.089C306.264 158.986 302.958 158.836 300.769 160.747C298.957 162.329 298.401 164.915 299.403 167.101ZM264.356 176.854L264.825 177.672C266.815 181.147 271.785 181.263 273.935 177.884C275.25 175.818 274.985 173.122 273.295 171.351L272.644 170.67C270.72 168.654 267.55 168.509 265.451 170.342C263.581 171.975 263.123 174.7 264.356 176.854ZM313.942 194.211L314.534 194.78C316.151 196.333 318.666 196.458 320.429 195.073C322.516 193.432 322.737 190.35 320.904 188.43L320.337 187.836C318.669 186.088 315.92 185.963 314.1 187.552C312.103 189.295 312.03 192.375 313.942 194.211ZM280.243 200.789L280.735 201.261C282.115 202.587 284.262 202.694 285.767 201.511C287.871 199.857 287.681 196.612 285.397 195.216L284.815 194.86C283.767 194.22 282.471 194.131 281.345 194.622C278.884 195.697 278.306 198.929 280.243 200.789ZM325.979 227.069L326.571 227.637C328.189 229.191 330.703 229.315 332.466 227.93C334.554 226.289 334.774 223.207 332.941 221.287L332.374 220.693C330.706 218.945 327.957 218.82 326.137 220.409C324.141 222.153 324.068 225.233 325.979 227.069ZM88.254 259.613L88.6775 259.896C91.5044 261.786 95.3136 261.147 97.3689 258.438C99.2765 255.924 99.0771 252.398 96.8984 250.115L96.5466 249.747C94.8147 247.932 92.1916 247.279 89.8113 248.071C84.6926 249.772 83.7693 256.616 88.254 259.613ZM310.774 249.582L311.366 250.15C312.983 251.704 315.498 251.829 317.261 250.443C319.349 248.803 319.569 245.721 317.736 243.8L317.169 243.207C315.501 241.459 312.752 241.334 310.932 242.923C308.935 244.666 308.862 247.746 310.774 249.582ZM229.68 168.656L230.272 169.224C231.889 170.778 234.404 170.902 236.167 169.517C238.255 167.877 238.475 164.795 236.642 162.874L236.075 162.28C234.407 160.532 231.658 160.407 229.838 161.997C227.841 163.74 227.768 166.82 229.68 168.656ZM248.053 200.296L248.645 200.865C250.262 202.418 252.777 202.543 254.54 201.157C256.628 199.517 256.848 196.435 255.015 194.514L254.448 193.921C252.78 192.173 250.031 192.048 248.211 193.637C246.214 195.38 246.141 198.46 248.053 200.296ZM218.276 206.381L218.868 206.949C220.485 208.503 223 208.627 224.763 207.242C226.851 205.602 227.071 202.52 225.238 200.599L224.671 200.005C223.003 198.257 220.254 198.132 218.434 199.722C216.437 201.465 216.364 204.545 218.276 206.381ZM286.353 216.569L285.185 217.632C283.051 219.573 283.006 222.914 285.086 224.911C286.878 226.632 289.664 226.77 291.617 225.235L292.859 224.26C294.292 223.133 295.006 221.32 294.724 219.519C294.105 215.552 289.322 213.867 286.353 216.569ZM241.084 231.328L241.676 231.896C243.293 233.45 245.808 233.575 247.571 232.189C249.659 230.549 249.879 227.467 248.046 225.546L247.479 224.952C245.811 223.205 243.062 223.079 241.242 224.669C239.245 226.412 239.172 229.492 241.084 231.328ZM278.463 256.884L279.055 257.452C280.673 259.005 283.187 259.13 284.95 257.745C287.038 256.104 287.258 253.022 285.425 251.102L284.858 250.508C283.19 248.76 280.441 248.635 278.621 250.224C276.625 251.968 276.551 255.048 278.463 256.884ZM237.588 261.751L238.18 262.32C239.797 263.873 242.312 263.998 244.075 262.612C246.162 260.972 246.383 257.89 244.55 255.97L243.983 255.376C242.315 253.628 239.566 253.503 237.746 255.092C235.749 256.835 235.676 259.915 237.588 261.751ZM167.658 161.388L166.471 162.365C163.825 164.543 163.672 168.542 166.144 170.916C167.588 172.303 169.651 172.835 171.586 172.319L173.072 171.922C178.763 170.404 179.163 162.482 173.655 160.398C171.623 159.629 169.335 160.007 167.658 161.388ZM198.635 182.042L199.227 182.611C200.845 184.164 203.359 184.289 205.122 182.903C207.21 181.263 207.43 178.181 205.597 176.26L205.031 175.667C203.362 173.919 200.614 173.794 198.793 175.383C196.797 177.126 196.724 180.206 198.635 182.042ZM144.555 232.545L145.147 233.113C146.764 234.667 149.278 234.792 151.042 233.406C153.129 231.766 153.35 228.684 151.516 226.763L150.95 226.169C149.281 224.421 146.533 224.296 144.713 225.886C142.716 227.629 142.643 230.709 144.555 232.545ZM190.399 212.465L190.991 213.034C192.608 214.587 195.123 214.712 196.886 213.327C198.974 211.686 199.194 208.604 197.361 206.684L196.794 206.09C195.126 204.342 192.377 204.217 190.557 205.806C188.56 207.55 188.487 210.629 190.399 212.465ZM158.493 205.164L159.085 205.732C160.702 207.286 163.217 207.411 164.98 206.025C167.067 204.385 167.288 201.303 165.455 199.382L164.888 198.788C163.22 197.041 160.471 196.915 158.651 198.505C156.654 200.248 156.581 203.328 158.493 205.164ZM211.307 244.714L211.899 245.283C213.516 246.836 216.031 246.961 217.794 245.575C219.882 243.935 220.102 240.853 218.269 238.932L217.702 238.339C216.034 236.591 213.285 236.466 211.465 238.055C209.468 239.798 209.395 242.878 211.307 244.714ZM178.996 245.931L179.588 246.5C181.205 248.053 183.72 248.178 185.483 246.792C187.57 245.152 187.791 242.07 185.958 240.149L185.391 239.556C183.723 237.808 180.974 237.683 179.154 239.272C177.157 241.015 177.084 244.095 178.996 245.931ZM369.694 238.63L370.286 239.198C371.904 240.751 374.418 240.876 376.182 239.491C378.269 237.85 378.489 234.768 376.656 232.848L376.09 232.254C374.421 230.506 371.673 230.381 369.852 231.97C367.856 233.714 367.783 236.794 369.694 238.63ZM391.643 253.053L394.736 255.578C397.197 257.587 400.909 256.13 401.346 252.983C401.517 251.752 401.116 250.51 400.258 249.61L397.502 246.722C395.905 245.05 393.275 244.93 391.534 246.451C389.518 248.211 389.57 251.361 391.643 253.053ZM408.808 298.33L409.471 298.698C411.238 299.68 413.421 299.507 415.011 298.258C417.34 296.428 417.586 292.989 415.541 290.846L415.017 290.298C413.455 288.661 411.006 288.24 408.987 289.26C405.312 291.118 405.21 296.329 408.808 298.33ZM369.694 273.921L370.286 274.489C371.904 276.043 374.418 276.167 376.182 274.782C378.269 273.141 378.489 270.059 376.656 268.139L376.09 267.545C374.421 265.797 371.673 265.672 369.852 267.261C367.856 269.005 367.783 272.085 369.694 273.921ZM375.94 313.993L376.634 314.66C378.608 316.555 381.676 316.708 383.828 315.017C385.737 313.517 386.434 310.942 385.542 308.684L385.188 307.788C383.315 303.045 376.632 302.961 374.641 307.656C373.717 309.833 374.234 312.355 375.94 313.993ZM340.955 313.458L340.584 313.681C336.487 316.14 337.438 322.331 342.085 323.447C343.671 323.828 345.345 323.462 346.628 322.454L346.969 322.186C349.433 320.25 349.693 316.611 347.529 314.344C345.815 312.548 343.084 312.18 340.955 313.458ZM398.838 340.244L399.43 340.812C401.048 342.365 403.562 342.49 405.326 341.105C407.413 339.464 407.633 336.382 405.8 334.462L405.234 333.868C403.565 332.12 400.817 331.995 398.996 333.584C397 335.328 396.927 338.408 398.838 340.244ZM116.907 279.397L117.499 279.965C119.116 281.519 121.631 281.644 123.394 280.258C125.481 278.618 125.702 275.536 123.869 273.615L123.302 273.021C121.634 271.273 118.885 271.148 117.065 272.738C115.068 274.481 114.995 277.561 116.907 279.397ZM190.399 309.82L190.991 310.389C192.608 311.942 195.123 312.067 196.886 310.681C198.974 309.041 199.194 305.959 197.361 304.039L196.794 303.445C195.126 301.697 192.377 301.572 190.557 303.161C188.561 304.904 188.487 307.984 190.399 309.82ZM257.96 326.844L256.781 327.552C254.317 329.031 254.241 332.576 256.639 334.159L258.674 335.503C260.422 336.657 262.713 336.563 264.36 335.269C266.617 333.495 266.855 330.162 264.873 328.086L264.534 327.731C262.82 325.934 260.089 325.566 257.96 326.844ZM350.688 354.238L351.28 354.807C352.898 356.36 355.412 356.485 357.176 355.099C359.263 353.459 359.483 350.377 357.65 348.457L357.084 347.863C355.415 346.115 352.667 345.99 350.846 347.579C348.85 349.322 348.777 352.402 350.688 354.238ZM300.004 354.238L300.596 354.807C302.213 356.36 304.728 356.485 306.491 355.099C308.578 353.459 308.799 350.377 306.966 348.457L306.399 347.863C304.73 346.115 301.982 345.99 300.162 347.579C298.165 349.322 298.092 352.402 300.004 354.238ZM71.9245 279.397L72.5165 279.965C74.1339 281.519 76.6484 281.644 78.4117 280.258C80.4992 278.618 80.7195 275.536 78.8864 273.615L78.3198 273.021C76.6514 271.273 73.9028 271.148 72.0826 272.738C70.0859 274.481 70.0128 277.561 71.9245 279.397ZM307.89 329.937L309.797 332.662C311.149 334.594 313.846 334.994 315.699 333.537C317.605 332.039 317.806 329.225 316.133 327.472L313.836 325.066C312.878 324.062 311.454 323.651 310.108 323.989C307.49 324.648 306.342 327.725 307.89 329.937Z" />
				</svg>
				<svg  id="logo_txt" class ="txt_icon" height="20" viewBox="0 0 116 28"  xmlns="http://www.w3.org/2000/svg">
					<path d="M19.873 27H18.7129L16.8496 24.416C16.3926 24.8262 15.9062 25.2129 15.3906 25.5762C14.8867 25.9277 14.3535 26.2383 13.791 26.5078C13.2285 26.7656 12.6484 26.9707 12.0508 27.123C11.4648 27.2754 10.8672 27.3516 10.2578 27.3516C8.93359 27.3516 7.68555 27.1055 6.51367 26.6133C5.35352 26.1094 4.33398 25.418 3.45508 24.5391C2.58789 23.6484 1.90234 22.5996 1.39844 21.3926C0.894531 20.1738 0.642578 18.8496 0.642578 17.4199C0.642578 16.002 0.894531 14.6836 1.39844 13.4648C1.90234 12.2461 2.58789 11.1914 3.45508 10.3008C4.33398 9.41016 5.35352 8.71289 6.51367 8.20898C7.68555 7.70508 8.93359 7.45312 10.2578 7.45312C10.6797 7.45312 11.1133 7.48828 11.5586 7.55859C12.0156 7.62891 12.4551 7.74609 12.877 7.91016C13.3105 8.0625 13.7148 8.26758 14.0898 8.52539C14.4648 8.7832 14.7812 9.09961 15.0391 9.47461V0.685547H19.873V27ZM15.0391 17.4199C15.0391 16.7637 14.9102 16.1309 14.6523 15.5215C14.4062 14.9004 14.0664 14.3555 13.6328 13.8867C13.1992 13.4062 12.6895 13.0254 12.1035 12.7441C11.5293 12.4512 10.9141 12.3047 10.2578 12.3047C9.60156 12.3047 8.98047 12.4219 8.39453 12.6562C7.82031 12.8906 7.31641 13.2305 6.88281 13.6758C6.46094 14.1094 6.12695 14.6426 5.88086 15.2754C5.63477 15.9082 5.51172 16.623 5.51172 17.4199C5.51172 18.1113 5.63477 18.7676 5.88086 19.3887C6.12695 20.0098 6.46094 20.5547 6.88281 21.0234C7.31641 21.4922 7.82031 21.8613 8.39453 22.1309C8.98047 22.4004 9.60156 22.5352 10.2578 22.5352C10.9141 22.5352 11.5293 22.3945 12.1035 22.1133C12.6895 21.8203 13.1992 21.4395 13.6328 20.9707C14.0664 20.4902 14.4062 19.9453 14.6523 19.3359C14.9102 18.7148 15.0391 18.0762 15.0391 17.4199Z"/><path d="M41.7402 17.4199C41.7402 18.8262 41.4883 20.1387 40.9844 21.3574C40.4805 22.5645 39.7949 23.6133 38.9277 24.5039C38.0605 25.3828 37.041 26.0801 35.8691 26.5957C34.709 27.0996 33.4609 27.3516 32.125 27.3516C30.8008 27.3516 29.5527 27.0996 28.3809 26.5957C27.2207 26.0801 26.2012 25.3828 25.3223 24.5039C24.4551 23.6133 23.7695 22.5645 23.2656 21.3574C22.7617 20.1387 22.5098 18.8262 22.5098 17.4199C22.5098 15.9902 22.7617 14.666 23.2656 13.4473C23.7695 12.2285 24.4551 11.1797 25.3223 10.3008C26.2012 9.41016 27.2207 8.71289 28.3809 8.20898C29.5527 7.70508 30.8008 7.45312 32.125 7.45312C33.4609 7.45312 34.709 7.69336 35.8691 8.17383C37.041 8.64258 38.0605 9.31641 38.9277 10.1953C39.7949 11.0625 40.4805 12.1113 40.9844 13.3418C41.4883 14.5605 41.7402 15.9199 41.7402 17.4199ZM36.9062 17.4199C36.9062 16.6465 36.7773 15.9492 36.5195 15.3281C36.2734 14.6953 35.9336 14.1562 35.5 13.7109C35.0664 13.2539 34.5566 12.9082 33.9707 12.6738C33.3965 12.4277 32.7812 12.3047 32.125 12.3047C31.4688 12.3047 30.8477 12.4277 30.2617 12.6738C29.6875 12.9082 29.1836 13.2539 28.75 13.7109C28.3281 14.1562 27.9941 14.6953 27.748 15.3281C27.502 15.9492 27.3789 16.6465 27.3789 17.4199C27.3789 18.1465 27.502 18.8203 27.748 19.4414C27.9941 20.0625 28.3281 20.6016 28.75 21.0586C29.1836 21.5156 29.6875 21.8789 30.2617 22.1484C30.8477 22.4062 31.4688 22.5352 32.125 22.5352C32.7812 22.5352 33.3965 22.4121 33.9707 22.166C34.5566 21.9199 35.0664 21.5742 35.5 21.1289C35.9336 20.6836 36.2734 20.1445 36.5195 19.5117C36.7773 18.8789 36.9062 18.1816 36.9062 17.4199Z"/><path d="M53.6934 27C52.5332 27 51.4434 26.7832 50.4238 26.3496C49.4043 25.9043 48.5078 25.3008 47.7344 24.5391C46.9727 23.7656 46.3691 22.8691 45.9238 21.8496C45.4902 20.8301 45.2734 19.7402 45.2734 18.5801V12.9902H42.9355V8.20898H45.2734V0.685547H50.0547V8.20898H57.332V12.9902H50.0547V18.5801C50.0547 19.084 50.1484 19.5586 50.3359 20.0039C50.5234 20.4375 50.7812 20.8184 51.1094 21.1465C51.4375 21.4746 51.8242 21.7383 52.2695 21.9375C52.7148 22.125 53.1895 22.2188 53.6934 22.2188H57.332V27H53.6934Z"/><path d="M64.8379 27H60.0391V0.685547H64.8379V9C65.4121 8.56641 66.0039 8.26172 66.6133 8.08594C67.2227 7.89844 67.8438 7.80469 68.4766 7.80469C69.6367 7.80469 70.7266 8.02734 71.7461 8.47266C72.7656 8.90625 73.6504 9.50977 74.4004 10.2832C75.1621 11.0449 75.7598 11.9414 76.1934 12.9727C76.6387 13.9922 76.8613 15.082 76.8613 16.2422V27H72.0273V16.2422H72.0625C72.0625 15.75 71.9688 15.2871 71.7812 14.8535C71.5938 14.4082 71.3359 14.0215 71.0078 13.6934C70.6797 13.3652 70.2988 13.1074 69.8652 12.9199C69.4316 12.7324 68.9688 12.6387 68.4766 12.6387C67.9727 12.6387 67.498 12.7324 67.0527 12.9199C66.6074 13.1074 66.2207 13.3652 65.8926 13.6934C65.5645 14.0215 65.3066 14.4082 65.1191 14.8535C64.9316 15.2871 64.8379 15.75 64.8379 16.2422V27Z"/><path d="M98.5176 27H97.3574L95.4941 24.416C95.0371 24.8262 94.5508 25.2129 94.0352 25.5762C93.5312 25.9277 92.998 26.2383 92.4355 26.5078C91.873 26.7656 91.293 26.9707 90.6953 27.123C90.1094 27.2754 89.5117 27.3516 88.9023 27.3516C87.5781 27.3516 86.3301 27.1289 85.1582 26.6836C83.998 26.2383 82.9785 25.5938 82.0996 24.75C81.2324 23.8945 80.5469 22.8516 80.043 21.6211C79.5391 20.3906 79.2871 18.9902 79.2871 17.4199C79.2871 15.9551 79.5391 14.6133 80.043 13.3945C80.5469 12.1641 81.2324 11.1094 82.0996 10.2305C82.9785 9.35156 83.998 8.67188 85.1582 8.19141C86.3301 7.69922 87.5781 7.45312 88.9023 7.45312C89.5117 7.45312 90.1152 7.5293 90.7129 7.68164C91.3105 7.83398 91.8906 8.04492 92.4531 8.31445C93.0156 8.58398 93.5488 8.90039 94.0527 9.26367C94.5684 9.62695 95.0488 10.0195 95.4941 10.4414L97.3574 8.20898H98.5176V27ZM93.6836 17.4199C93.6836 16.7637 93.5547 16.1309 93.2969 15.5215C93.0508 14.9004 92.7109 14.3555 92.2773 13.8867C91.8438 13.4062 91.334 13.0254 90.748 12.7441C90.1738 12.4512 89.5586 12.3047 88.9023 12.3047C88.2461 12.3047 87.625 12.416 87.0391 12.6387C86.4648 12.8613 85.9609 13.1895 85.5273 13.623C85.1055 14.0566 84.7715 14.5957 84.5254 15.2402C84.2793 15.873 84.1562 16.5996 84.1562 17.4199C84.1562 18.2402 84.2793 18.9727 84.5254 19.6172C84.7715 20.25 85.1055 20.7832 85.5273 21.2168C85.9609 21.6504 86.4648 21.9785 87.0391 22.2012C87.625 22.4238 88.2461 22.5352 88.9023 22.5352C89.5586 22.5352 90.1738 22.3945 90.748 22.1133C91.334 21.8203 91.8438 21.4395 92.2773 20.9707C92.7109 20.4902 93.0508 19.9453 93.2969 19.3359C93.5547 18.7148 93.6836 18.0762 93.6836 17.4199Z"/><path d="M111.631 27C110.471 27 109.381 26.7832 108.361 26.3496C107.342 25.9043 106.445 25.3008 105.672 24.5391C104.91 23.7656 104.307 22.8691 103.861 21.8496C103.428 20.8301 103.211 19.7402 103.211 18.5801V12.9902H100.873V8.20898H103.211V0.685547H107.992V8.20898H115.27V12.9902H107.992V18.5801C107.992 19.084 108.086 19.5586 108.273 20.0039C108.461 20.4375 108.719 20.8184 109.047 21.1465C109.375 21.4746 109.762 21.7383 110.207 21.9375C110.652 22.125 111.127 22.2188 111.631 22.2188H115.27V27H111.631Z"/>
				</svg>
			</div>
			<form id="search_box" class="flex_midle_center search_box" method="get" action="" autocomplete="off">
				<input id="input_field" class="google_sans input" type="text" name="q" placeholder="search" tabindex="1">
				<input type="submit" tabindex="2" value="S" class="search_button icon_font">
			</form>		
		</div>		
		<div class="flex_row_center">
			<div id="bb" class="flex_row_space_between">
				<img id="avatar" <?php resize_image($pic[0], 0.5);?> class="avatar">
				<div id="desktop_menu" class="blue_button" onmouseover="dropdownon()" onclick="dropdown()">
					<p id="username"><?php echo GOLDEN_GATE; ?></p>
					<div id="drop_menu" onmouseout="undropdown()">
						<ul>
							<li>Profile</li>
							<li>Settings</li>
							<li>Friends</li>
							<li>FAQ</li>
							<li onclick="logout();">Log out</li>
						</ul>
					</div>
				</div>
				<div onclick="openMenu()" onmouseover="mouseOn(this)" id="menu_button">⇶</div>
			</div>
		</div>
	</div>
</header>
<content onclick="undropdown()">
	<div id="content" class="container">
		<div id="content_left" class="">
			<div class="post">
				<div class="poster_info flex_midle_center">
					<img <?php resize_image($pic[1], 0.2);?> class="avatar">
					<div class="avatar_info"><b>Lena</b> @Lena_d</div>
				</div>
				<a class="post_content" href="">
					<div class="media flex_col_center"><img <?php resize_image($pic[2], 0.2);?> loading='lazy' /></div>
					<div class="post_title">The Modern Lord of Dance</div>
					<div class="post_text">
					As the choreographer of the video for Sia's "Chandelier," FKA Twigs's Apple commercial, the Five Movements in 'The OA,' and, most recently, the musical finale of 'Transparent,' Ryan Heffington
					</div>
				</a>				
				<div class="stat flex_midle_center">
					<div class="likes flex_row_center">
						<svg viewBox="0 0 35 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.1695 24.417V14.5376C12.1695 13.368 13.1738 12.4592 14.3399 12.3689C14.9577 12.3211 15.5842 12.2183 16.0337 12.014L18.8441 5.69075C18.8441 3.93432 18.8441 0.964311 20.2492 1.47525C25.5186 3.39126 22.7083 12.3653 22.7083 12.3653H31.8419C33.9496 12.3653 34.6522 16.2295 31.8419 16.2295C31.8419 16.2295 33.9496 19.7424 30.0854 19.7424C30.0854 19.7424 32.1931 22.9041 29.0315 22.9041C29.0315 22.9041 31.8419 26.0657 26.9238 26.417H14.1695C13.0649 26.417 12.1695 25.5216 12.1695 24.417Z"  stroke-width="2"/><path d="M3.5 12.3653H7.35917C8.46374 12.3653 9.35917 13.2607 9.35917 14.3653V24.417C9.35917 25.5216 8.46374 26.417 7.35917 26.417H3.5C2.39543 26.417 1.5 25.5216 1.5 24.417V14.3653C1.5 13.2607 2.39543 12.3653 3.5 12.3653Z" stroke-width="2"/></svg>
						<div class="likes_count">25.k</div>
					</div>
					<div class="comments flex_row_center">
						<svg viewBox="0 0 33 29" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30.2212 1H2.23037C1.55085 1 1 1.72212 1 2.6129V17.129C1 18.0198 1.55085 18.7419 2.23037 18.7419H4.38351V26L10.2278 18.7419H30.2212C30.9008 18.7419 31.4516 18.0198 31.4516 17.129V2.6129C31.4516 1.72212 30.9008 1 30.2212 1Z"  stroke-width="2"/></svg>
						<div class="comments_count">123.k</div>
					</div>
				</div>
			</div>
		</div>
		<div id="content_right" class="">
			<div class="groups">
				<div class="titles">Recomended groups</div>
				<div class="flex_midle_center  grp">
					<img class="avatar" <?php resize_image("data/image/univ.jpg", 0.1);?> >
					<div class="group_name">Kristmas Party</div>
				</div>
			</div>
			<div class="groups">
				<div class="titles">Popular groups</div>
				<div class="flex_midle_center  grp">
					<img class="avatar" <?php resize_image("data/image/univ.jpg", 0.1);?>>
					<div class="group_name">Kristmas Party</div>
				</div>
			</div>
		</div>
	</div>
</content>
<input type="hidden" id="goldendate" value="<?php echo GOLDEN_GATE; ?>">
<div id="menu_back" onclick="openMenu()"></div>
<div id="menu">
	<div id="close" class="" onclick="openMenu()">×</div>
	<div id="menu_title"><b>MENU</b></div>
	<div id="menu_content">
		<ul>
			<li>Profile</li>
			<li>Settings</li>
			<li>Friends</li>
			<li>FAQ</li>
			<li onclick="logout();">Log out</li>
		</ul>
	</div>
	<div id="copyright">&copy; dothat <?php echo date('Y');?> | KU License</div>
</div>
<script type="text/javascript">	
	function logout() {
		var ajax = new XMLHttpRequest();
		ajax.open('GET', '?logout', true);
		ajax.send();
		ajax.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				window.location.replace('/');
			}
		}
	}
	function checkEmail(e) {
		var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
		return filter.test(e);
	}
	function Check() {
		var err = checkEmail(_('email').value);
		console.log(err);		
	}
	window.onload = function() {
		var gg = _('goldendate').value;
	}

</script>
</body>
</html>


<!-- 
?a=" in (toString=alert.window%2b")/

?a " in (getString (/[^\n](a+)+/))"
-->
