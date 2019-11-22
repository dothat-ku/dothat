<?php
session_start();
$session_id = session_id();

include('load.php');

if (isset($_SESSION['username'])) {
		header('location: main/');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>dothat - always welcomes you!</title>
	<script type="text/javascript" src="js/welcome.js"></script>
	<link rel="stylesheet" type="text/css" href="css/welcome.css">
	<meta name="viewport" content="width=device-width" />
	<meta name="theme-color" content="#ffffff" />

</head>
<body>
<div id="content" class="flex_row_center">
	<div id="wleft" class="flex_col_center">
		<div class="iconik"><svg  viewBox="0 0 83 50" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path fill-rule="evenodd" clip-rule="evenodd" d="M63.9319 16.1047C69.5661 16.1913 80.4288 18.5722 82.5924 29.0914C84.6565 39.1274 78.9414 49.3507 64.0671 50C49.3834 49.6269 41.358 44.3343 34.0294 39.8889C28.0214 36.2445 22.8119 33.0845 15.9284 33.377C9.25962 33.6604 1.16621 33.1291 0.918899 29.0914C0.648445 24.676 6.90536 19.6456 13.6297 21.5591C17.6782 22.7112 19.6068 24.6618 21.5588 26.6361C23.1274 28.2225 24.7111 29.8243 27.4222 31.0394C28.0104 31.3031 28.6252 31.5898 29.2706 31.8907L29.2713 31.8911C35.3016 34.7034 44.001 38.7604 58.6583 36.8834C65.9602 35.9484 67.4476 31.2992 67.4476 28.7018C67.4476 26.624 66.1856 23.637 65.4193 22.3383C65.6447 24.2431 62.174 29.3765 52.5733 29.6109C36.6172 30.0005 26.6109 25.0656 19.5794 20.9098C20.5259 14.7628 22.8247 2.98818 27.4222 2.46871C30.4879 2.12232 34.7181 2.2883 37.918 2.41386C39.9045 2.49181 41.4939 2.55417 42.1613 2.46871C42.7142 2.39791 43.2872 2.08584 43.9845 1.70613C45.8449 0.692947 48.5895 -0.801799 54.196 0.520709C59.4581 1.76197 62.3622 10.342 63.6369 15.0309L63.6371 15.0316C63.7418 15.4166 63.8396 15.7763 63.9319 16.1047ZM50.7632 2.93804C50.3552 2.54617 50.3708 1.88881 50.797 1.51674V1.51674C51.1855 1.17756 51.7721 1.20425 52.1282 1.57732L52.2491 1.70404C52.6404 2.11394 52.5934 2.77173 52.1478 3.12183V3.12183C51.7715 3.41756 51.2348 3.39092 50.8896 3.05938L50.7632 2.93804ZM54.9621 6.11269C54.7483 5.64596 54.8669 5.09416 55.2536 4.75651V4.75651C55.7209 4.34855 56.4265 4.38066 56.8548 4.82937L56.9977 4.97915C57.3451 5.34304 57.4271 5.88557 57.2028 6.33587V6.33587C56.7554 7.23433 55.4664 7.21343 55.0484 6.30093L54.9621 6.11269ZM47.482 8.19431C47.2187 7.73455 47.3165 7.15287 47.7156 6.80441V6.80441C48.1637 6.41321 48.8403 6.444 49.2509 6.87428L49.3898 7.01972C49.7506 7.39776 49.807 7.97319 49.5264 8.4141V8.4141C49.0676 9.13523 48.0067 9.11051 47.582 8.36878L47.482 8.19431ZM58.0652 11.8989C57.6571 11.507 57.6727 10.8496 58.0989 10.4776V10.4776C58.4874 10.1384 59.074 10.1651 59.4301 10.5381L59.5511 10.6649C59.9423 11.0748 59.8953 11.7325 59.4497 12.0826V12.0826C59.0734 12.3784 58.5367 12.3517 58.1915 12.0202L58.0652 11.8989ZM50.8728 13.3028C50.4594 12.9057 50.5827 12.2159 51.108 11.9866V11.9866C51.3484 11.8816 51.6248 11.9006 51.8486 12.0374L51.9727 12.1132C52.4602 12.4111 52.5009 13.1039 52.0517 13.4568V13.4568C51.7305 13.7093 51.2724 13.6865 50.9777 13.4035L50.8728 13.3028ZM60.6344 18.9117C60.2263 18.5198 60.2419 17.8624 60.6681 17.4904V17.4904C61.0566 17.1512 61.6432 17.1779 61.9993 17.5509L62.1203 17.6777C62.5115 18.0876 62.4645 18.7454 62.0189 19.0955V19.0955C61.6426 19.3912 61.1059 19.3645 60.7607 19.033L60.6344 18.9117ZM9.896 25.8578C8.93881 25.2181 9.13588 23.7574 10.2284 23.3942V23.3942C10.7364 23.2253 11.2963 23.3646 11.6659 23.7519L11.741 23.8305C12.206 24.3177 12.2486 25.0704 11.8414 25.6069V25.6069C11.4027 26.185 10.5897 26.3214 9.9864 25.9182L9.896 25.8578ZM57.3891 23.7167C56.981 23.3249 56.9966 22.6675 57.4228 22.2955V22.2955C57.8113 21.9563 58.3979 21.983 58.754 22.356L58.875 22.4827C59.2662 22.8926 59.2192 23.5504 58.7736 23.9005V23.9005C58.3973 24.1963 57.8606 24.1696 57.5154 23.8381L57.3891 23.7167ZM40.0809 6.44444C39.6729 6.05257 39.6885 5.39522 40.1147 5.02315V5.02315C40.5031 4.68396 41.0898 4.71065 41.4459 5.08372L41.5668 5.21044C41.9581 5.62034 41.911 6.27813 41.4655 6.62823V6.62823C41.0892 6.92396 40.5525 6.89732 40.2073 6.56578L40.0809 6.44444ZM44.0023 13.1975C43.5943 12.8057 43.6099 12.1483 44.0361 11.7762V11.7762C44.4246 11.437 45.0112 11.4637 45.3673 11.8368L45.4882 11.9635C45.8795 12.3734 45.8325 13.0312 45.3869 13.3813V13.3813C45.0106 13.677 44.4739 13.6504 44.1287 13.3189L44.0023 13.1975ZM37.647 14.4962C37.2389 14.1043 37.2545 13.447 37.6807 13.0749V13.0749C38.0692 12.7357 38.6558 12.7624 39.0119 13.1355L39.1328 13.2622C39.5241 13.6721 39.4771 14.3299 39.0315 14.68V14.68C38.6552 14.9757 38.1185 14.9491 37.7733 14.6175L37.647 14.4962ZM51.9065 18.4512C51.4625 18.0248 51.4721 17.3118 51.9274 16.8975L52.1767 16.6707C52.8105 16.094 53.8313 16.4537 53.9635 17.3003V17.3003C54.0236 17.6848 53.8713 18.0717 53.5653 18.3122L53.3003 18.5204C52.8834 18.848 52.2889 18.8185 51.9065 18.4512V18.4512ZM42.5149 19.8207C42.1069 19.4289 42.1225 18.7715 42.5486 18.3994V18.3994C42.9371 18.0603 43.5238 18.0869 43.8799 18.46L44.0008 18.5867C44.392 18.9966 44.345 19.6544 43.8995 20.0045V20.0045C43.5231 20.3003 42.9865 20.2736 42.6412 19.9421L42.5149 19.8207ZM50.4929 25.2751C50.0849 24.8833 50.1005 24.2259 50.5266 23.8538V23.8538C50.9151 23.5147 51.5017 23.5414 51.8578 23.9144L51.9788 24.0411C52.37 24.451 52.323 25.1088 51.8775 25.4589V25.4589C51.5011 25.7547 50.9644 25.728 50.6192 25.3965L50.4929 25.2751ZM41.7687 26.3141C41.3607 25.9222 41.3763 25.2649 41.8024 24.8928V24.8928C42.1909 24.5536 42.7776 24.5803 43.1337 24.9534L43.2546 25.0801C43.6458 25.49 43.5988 26.1478 43.1533 26.4979V26.4979C42.7769 26.7936 42.2403 26.767 41.8951 26.4354L41.7687 26.3141ZM26.5202 6.92683C25.9927 6.42018 26.0253 5.56673 26.59 5.10184L26.8435 4.89316C27.2014 4.59848 27.6897 4.51791 28.1233 4.68197V4.68197C29.2989 5.12676 29.2135 6.81757 27.999 7.14158L27.6818 7.22621C27.2689 7.33637 26.8284 7.22285 26.5202 6.92683V6.92683ZM33.455 9.30152C33.047 8.90966 33.0626 8.2523 33.4887 7.88023V7.88023C33.8772 7.54104 34.4639 7.56773 34.8199 7.9408L34.9409 8.06752C35.3321 8.47742 35.2851 9.13522 34.8396 9.48532V9.48532C34.4632 9.78104 33.9265 9.7544 33.5813 9.42286L33.455 9.30152ZM21.9124 20.0805C21.5044 19.6886 21.52 19.0312 21.9461 18.6592V18.6592C22.3346 18.32 22.9213 18.3467 23.2773 18.7197L23.3983 18.8465C23.7895 19.2564 23.7425 19.9142 23.297 20.2643V20.2643C22.9206 20.56 22.3839 20.5333 22.0387 20.2018L21.9124 20.0805ZM31.6971 15.7949C31.2891 15.403 31.3047 14.7456 31.7308 14.3736V14.3736C32.1193 14.0344 32.706 14.0611 33.0621 14.4342L33.183 14.5609C33.5742 14.9708 33.5272 15.6286 33.0817 15.9787V15.9787C32.7053 16.2744 32.1687 16.2477 31.8235 15.9162L31.6971 15.7949ZM24.8873 14.2365C24.4792 13.8446 24.4948 13.1872 24.921 12.8152V12.8152C25.3095 12.476 25.8961 12.5027 26.2522 12.8758L26.3731 13.0025C26.7644 13.4124 26.7174 14.0702 26.2718 14.4203V14.4203C25.8955 14.716 25.3588 14.6893 25.0136 14.3578L24.8873 14.2365ZM36.1595 22.6778C35.7515 22.2859 35.7671 21.6286 36.1932 21.2565V21.2565C36.5817 20.9173 37.1684 20.944 37.5245 21.3171L37.6454 21.4438C38.0366 21.8537 37.9896 22.5115 37.5441 22.8616V22.8616C37.1677 23.1573 36.6311 23.1307 36.2859 22.7991L36.1595 22.6778ZM29.2632 22.9375C28.8552 22.5457 28.8708 21.8883 29.297 21.5162V21.5162C29.6855 21.1771 30.2721 21.2037 30.6282 21.5768L30.7491 21.7035C31.1404 22.1134 31.0934 22.7712 30.6478 23.1213V23.1213C30.2715 23.4171 29.7348 23.3904 29.3896 23.0589L29.2632 22.9375ZM69.9646 21.3791C69.5566 20.9873 69.5722 20.3299 69.9983 19.9578V19.9578C70.3868 19.6187 70.9735 19.6454 71.3296 20.0184L71.4505 20.1451C71.8417 20.555 71.7947 21.2128 71.3492 21.5629V21.5629C70.9728 21.8587 70.4362 21.832 70.091 21.5005L69.9646 21.3791ZM74.6492 24.4577C74.2068 24.0965 74.1956 23.4241 74.6259 23.0485V23.0485C74.9976 22.7239 75.5589 22.7495 75.8996 23.1064L76.4879 23.7228C76.6711 23.9147 76.7566 24.1798 76.7201 24.4426V24.4426C76.6269 25.1143 75.8346 25.4254 75.3093 24.9965L74.6492 24.4577ZM78.3128 34.1211C77.5447 33.694 77.5666 32.5819 78.351 32.1854V32.1854C78.7819 31.9676 79.3047 32.0575 79.638 32.4068L79.7497 32.5238C80.1862 32.9812 80.1338 33.7151 79.6367 34.1058V34.1058C79.2974 34.3724 78.8313 34.4094 78.4542 34.1997L78.3128 34.1211ZM69.9646 28.9114C69.5566 28.5196 69.5722 27.8622 69.9983 27.4901V27.4901C70.3868 27.1509 70.9735 27.1776 71.3296 27.5507L71.4505 27.6774C71.8417 28.0873 71.7947 28.7451 71.3492 29.0952V29.0952C70.9728 29.3909 70.4362 29.3643 70.091 29.0328L69.9646 28.9114ZM71.2975 37.4641C70.9335 37.1145 70.8232 36.5764 71.0203 36.1117V36.1117C71.4454 35.1097 72.8717 35.1275 73.2716 36.1399L73.347 36.331C73.5374 36.8129 73.3886 37.3626 72.9812 37.6827V37.6827C72.522 38.0436 71.867 38.011 71.4458 37.6065L71.2975 37.4641ZM64.0718 39.4819C63.0801 39.2438 62.877 37.9225 63.7515 37.3976L63.8308 37.35C64.2852 37.0772 64.868 37.1558 65.2339 37.5392V37.5392C65.6957 38.0231 65.6402 38.7995 65.1143 39.2128L65.0416 39.2699C64.7677 39.4851 64.4105 39.5632 64.0718 39.4819V39.4819ZM76.1849 43.0669C75.7769 42.675 75.7925 42.0177 76.2186 41.6456V41.6456C76.6071 41.3064 77.1938 41.3331 77.5498 41.7062L77.6708 41.8329C78.062 42.2428 78.015 42.9006 77.5695 43.2507V43.2507C77.1931 43.5464 76.6565 43.5198 76.3112 43.1883L76.1849 43.0669ZM16.0114 30.0802C15.6034 29.6884 15.619 29.031 16.0452 28.6589V28.6589C16.4337 28.3197 17.0203 28.3464 17.3764 28.7195L17.4973 28.8462C17.8886 29.2561 17.8416 29.9139 17.396 30.264V30.264C17.0197 30.5597 16.483 30.5331 16.1378 30.2016L16.0114 30.0802ZM31.6971 36.5736C31.2891 36.1817 31.3047 35.5243 31.7308 35.1523V35.1523C32.1193 34.8131 32.706 34.8398 33.0621 35.2128L33.183 35.3396C33.5742 35.7495 33.5272 36.4073 33.0817 36.7574V36.7574C32.7053 37.0531 32.1687 37.0264 31.8235 36.6949L31.6971 36.5736ZM45.8349 41.7683C45.323 41.4303 45.3392 40.6739 45.8652 40.3581L46.1168 40.2071C46.5712 39.9343 47.154 40.0129 47.5199 40.3963L47.5923 40.4721C48.0153 40.9153 47.9645 41.6266 47.4827 42.0051V42.0051C47.1312 42.2814 46.6423 42.3015 46.2693 42.0552L45.8349 41.7683ZM65.9081 46.0539C65.5001 45.662 65.5157 45.0046 65.9418 44.6325V44.6325C66.3303 44.2934 66.917 44.3201 67.2731 44.6931L67.394 44.8198C67.7852 45.2297 67.7382 45.8875 67.2927 46.2376V46.2376C66.9163 46.5334 66.3797 46.5067 66.0344 46.1752L65.9081 46.0539ZM55.0903 46.0539C54.6823 45.662 54.6979 45.0046 55.1241 44.6326V44.6326C55.5125 44.2934 56.0992 44.3201 56.4553 44.6931L56.5762 44.8199C56.9674 45.2297 56.9204 45.8875 56.4749 46.2376V46.2376C56.0986 46.5334 55.5619 46.5067 55.2167 46.1752L55.0903 46.0539ZM6.41075 30.0802C6.00273 29.6884 6.01833 29.031 6.44448 28.6589V28.6589C6.83297 28.3197 7.41962 28.3464 7.7757 28.7195L7.89665 28.8462C8.28788 29.2561 8.24087 29.9139 7.79533 30.264V30.264C7.41898 30.5597 6.8823 30.5331 6.53709 30.2016L6.41075 30.0802ZM56.7735 40.8671C56.4432 40.395 56.6881 39.7382 57.2469 39.5977V39.5977C57.5342 39.5254 57.8381 39.6132 58.0427 39.8275L58.5328 40.341C58.89 40.7153 58.8471 41.3158 58.4403 41.6355V41.6355C58.0446 41.9464 57.469 41.8611 57.1805 41.4488L56.7735 40.8671Z" fill="#4f0000"/>
		</svg><svg viewBox="0 0 116 28" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M19.873 27H18.7129L16.8496 24.416C16.3926 24.8262 15.9062 25.2129 15.3906 25.5762C14.8867 25.9277 14.3535 26.2383 13.791 26.5078C13.2285 26.7656 12.6484 26.9707 12.0508 27.123C11.4648 27.2754 10.8672 27.3516 10.2578 27.3516C8.93359 27.3516 7.68555 27.1055 6.51367 26.6133C5.35352 26.1094 4.33398 25.418 3.45508 24.5391C2.58789 23.6484 1.90234 22.5996 1.39844 21.3926C0.894531 20.1738 0.642578 18.8496 0.642578 17.4199C0.642578 16.002 0.894531 14.6836 1.39844 13.4648C1.90234 12.2461 2.58789 11.1914 3.45508 10.3008C4.33398 9.41016 5.35352 8.71289 6.51367 8.20898C7.68555 7.70508 8.93359 7.45312 10.2578 7.45312C10.6797 7.45312 11.1133 7.48828 11.5586 7.55859C12.0156 7.62891 12.4551 7.74609 12.877 7.91016C13.3105 8.0625 13.7148 8.26758 14.0898 8.52539C14.4648 8.7832 14.7812 9.09961 15.0391 9.47461V0.685547H19.873V27ZM15.0391 17.4199C15.0391 16.7637 14.9102 16.1309 14.6523 15.5215C14.4062 14.9004 14.0664 14.3555 13.6328 13.8867C13.1992 13.4062 12.6895 13.0254 12.1035 12.7441C11.5293 12.4512 10.9141 12.3047 10.2578 12.3047C9.60156 12.3047 8.98047 12.4219 8.39453 12.6562C7.82031 12.8906 7.31641 13.2305 6.88281 13.6758C6.46094 14.1094 6.12695 14.6426 5.88086 15.2754C5.63477 15.9082 5.51172 16.623 5.51172 17.4199C5.51172 18.1113 5.63477 18.7676 5.88086 19.3887C6.12695 20.0098 6.46094 20.5547 6.88281 21.0234C7.31641 21.4922 7.82031 21.8613 8.39453 22.1309C8.98047 22.4004 9.60156 22.5352 10.2578 22.5352C10.9141 22.5352 11.5293 22.3945 12.1035 22.1133C12.6895 21.8203 13.1992 21.4395 13.6328 20.9707C14.0664 20.4902 14.4062 19.9453 14.6523 19.3359C14.9102 18.7148 15.0391 18.0762 15.0391 17.4199Z" fill="#4f0000"/>
		<path d="M41.7402 17.4199C41.7402 18.8262 41.4883 20.1387 40.9844 21.3574C40.4805 22.5645 39.7949 23.6133 38.9277 24.5039C38.0605 25.3828 37.041 26.0801 35.8691 26.5957C34.709 27.0996 33.4609 27.3516 32.125 27.3516C30.8008 27.3516 29.5527 27.0996 28.3809 26.5957C27.2207 26.0801 26.2012 25.3828 25.3223 24.5039C24.4551 23.6133 23.7695 22.5645 23.2656 21.3574C22.7617 20.1387 22.5098 18.8262 22.5098 17.4199C22.5098 15.9902 22.7617 14.666 23.2656 13.4473C23.7695 12.2285 24.4551 11.1797 25.3223 10.3008C26.2012 9.41016 27.2207 8.71289 28.3809 8.20898C29.5527 7.70508 30.8008 7.45312 32.125 7.45312C33.4609 7.45312 34.709 7.69336 35.8691 8.17383C37.041 8.64258 38.0605 9.31641 38.9277 10.1953C39.7949 11.0625 40.4805 12.1113 40.9844 13.3418C41.4883 14.5605 41.7402 15.9199 41.7402 17.4199ZM36.9062 17.4199C36.9062 16.6465 36.7773 15.9492 36.5195 15.3281C36.2734 14.6953 35.9336 14.1562 35.5 13.7109C35.0664 13.2539 34.5566 12.9082 33.9707 12.6738C33.3965 12.4277 32.7812 12.3047 32.125 12.3047C31.4688 12.3047 30.8477 12.4277 30.2617 12.6738C29.6875 12.9082 29.1836 13.2539 28.75 13.7109C28.3281 14.1562 27.9941 14.6953 27.748 15.3281C27.502 15.9492 27.3789 16.6465 27.3789 17.4199C27.3789 18.1465 27.502 18.8203 27.748 19.4414C27.9941 20.0625 28.3281 20.6016 28.75 21.0586C29.1836 21.5156 29.6875 21.8789 30.2617 22.1484C30.8477 22.4062 31.4688 22.5352 32.125 22.5352C32.7812 22.5352 33.3965 22.4121 33.9707 22.166C34.5566 21.9199 35.0664 21.5742 35.5 21.1289C35.9336 20.6836 36.2734 20.1445 36.5195 19.5117C36.7773 18.8789 36.9062 18.1816 36.9062 17.4199Z" fill="#4f0000"/>
		<path d="M53.6934 27C52.5332 27 51.4434 26.7832 50.4238 26.3496C49.4043 25.9043 48.5078 25.3008 47.7344 24.5391C46.9727 23.7656 46.3691 22.8691 45.9238 21.8496C45.4902 20.8301 45.2734 19.7402 45.2734 18.5801V12.9902H42.9355V8.20898H45.2734V0.685547H50.0547V8.20898H57.332V12.9902H50.0547V18.5801C50.0547 19.084 50.1484 19.5586 50.3359 20.0039C50.5234 20.4375 50.7812 20.8184 51.1094 21.1465C51.4375 21.4746 51.8242 21.7383 52.2695 21.9375C52.7148 22.125 53.1895 22.2188 53.6934 22.2188H57.332V27H53.6934Z" fill="#4f0000"/>
		<path d="M64.8379 27H60.0391V0.685547H64.8379V9C65.4121 8.56641 66.0039 8.26172 66.6133 8.08594C67.2227 7.89844 67.8438 7.80469 68.4766 7.80469C69.6367 7.80469 70.7266 8.02734 71.7461 8.47266C72.7656 8.90625 73.6504 9.50977 74.4004 10.2832C75.1621 11.0449 75.7598 11.9414 76.1934 12.9727C76.6387 13.9922 76.8613 15.082 76.8613 16.2422V27H72.0273V16.2422H72.0625C72.0625 15.75 71.9688 15.2871 71.7812 14.8535C71.5938 14.4082 71.3359 14.0215 71.0078 13.6934C70.6797 13.3652 70.2988 13.1074 69.8652 12.9199C69.4316 12.7324 68.9688 12.6387 68.4766 12.6387C67.9727 12.6387 67.498 12.7324 67.0527 12.9199C66.6074 13.1074 66.2207 13.3652 65.8926 13.6934C65.5645 14.0215 65.3066 14.4082 65.1191 14.8535C64.9316 15.2871 64.8379 15.75 64.8379 16.2422V27Z" fill="#4f0000"/>
		<path d="M98.5176 27H97.3574L95.4941 24.416C95.0371 24.8262 94.5508 25.2129 94.0352 25.5762C93.5312 25.9277 92.998 26.2383 92.4355 26.5078C91.873 26.7656 91.293 26.9707 90.6953 27.123C90.1094 27.2754 89.5117 27.3516 88.9023 27.3516C87.5781 27.3516 86.3301 27.1289 85.1582 26.6836C83.998 26.2383 82.9785 25.5938 82.0996 24.75C81.2324 23.8945 80.5469 22.8516 80.043 21.6211C79.5391 20.3906 79.2871 18.9902 79.2871 17.4199C79.2871 15.9551 79.5391 14.6133 80.043 13.3945C80.5469 12.1641 81.2324 11.1094 82.0996 10.2305C82.9785 9.35156 83.998 8.67188 85.1582 8.19141C86.3301 7.69922 87.5781 7.45312 88.9023 7.45312C89.5117 7.45312 90.1152 7.5293 90.7129 7.68164C91.3105 7.83398 91.8906 8.04492 92.4531 8.31445C93.0156 8.58398 93.5488 8.90039 94.0527 9.26367C94.5684 9.62695 95.0488 10.0195 95.4941 10.4414L97.3574 8.20898H98.5176V27ZM93.6836 17.4199C93.6836 16.7637 93.5547 16.1309 93.2969 15.5215C93.0508 14.9004 92.7109 14.3555 92.2773 13.8867C91.8438 13.4062 91.334 13.0254 90.748 12.7441C90.1738 12.4512 89.5586 12.3047 88.9023 12.3047C88.2461 12.3047 87.625 12.416 87.0391 12.6387C86.4648 12.8613 85.9609 13.1895 85.5273 13.623C85.1055 14.0566 84.7715 14.5957 84.5254 15.2402C84.2793 15.873 84.1562 16.5996 84.1562 17.4199C84.1562 18.2402 84.2793 18.9727 84.5254 19.6172C84.7715 20.25 85.1055 20.7832 85.5273 21.2168C85.9609 21.6504 86.4648 21.9785 87.0391 22.2012C87.625 22.4238 88.2461 22.5352 88.9023 22.5352C89.5586 22.5352 90.1738 22.3945 90.748 22.1133C91.334 21.8203 91.8438 21.4395 92.2773 20.9707C92.7109 20.4902 93.0508 19.9453 93.2969 19.3359C93.5547 18.7148 93.6836 18.0762 93.6836 17.4199Z" fill="#4f0000"/>
		<path d="M111.631 27C110.471 27 109.381 26.7832 108.361 26.3496C107.342 25.9043 106.445 25.3008 105.672 24.5391C104.91 23.7656 104.307 22.8691 103.861 21.8496C103.428 20.8301 103.211 19.7402 103.211 18.5801V12.9902H100.873V8.20898H103.211V0.685547H107.992V8.20898H115.27V12.9902H107.992V18.5801C107.992 19.084 108.086 19.5586 108.273 20.0039C108.461 20.4375 108.719 20.8184 109.047 21.1465C109.375 21.4746 109.762 21.7383 110.207 21.9375C110.652 22.125 111.127 22.2188 111.631 22.2188H115.27V27H111.631Z" fill="#4f0000"/>
		</svg></div>
		<div style="position: absolute;bottom: 10px; font-size: 0.8em; color: #4f0000; font-family: 'open_sans'">&copy; dothat <?php echo date('Y'); ?> | KU License <?php echo $_SESSION['username']; ?></div>
	</div>
	<div id="wright" class="flex_col_center">
		<form id="in" class="login_form" method="GET" action="/">
			<div class="message">Connect to your community, they are waiting for you</div>
			<div id="loginform" class="wide">
				<label>Email*</label>
				<div class="flex_row_space_between input">
					<input type="text" id="lun" class="input_type" name="an" autocomplete="off" minlength="5" maxlength="70" autofocus required>
					<div class="valid valid_1"></div>
				</div>
				<label>Password*</label>
				<div class="flex_row_space_between input">
					<input type="password" id="lpw" class="input_type" name="pw" autocomplete="off" minlength="4" maxlength="50" required>
					<div class="valid  valid_2"></div>
				</div>			
			</div>
			<button id="logbtn" type="submit" name="sigin" class="google_sans blue_button" style="border: none; font-size: 15px;">contnue</button>
			<div class="flex_row_space_between">
				<div class="offer" style="cursor: pointer;" onclick="tab();">CREATE ACCOUNT</div>
				<div class="asking" >forgot password?</div>
			</div>
		</form>
		<form id="up" class="signup_form" method="POST" action="/">
			<div class="message">Create your account</div>
			<div class="wide">
				<label>Username*</label>
				<div class="flex_row_space_between input">
					<input type="text" id="sun" class="input_type" name="identity" autocomplete="off"  maxlength="31" required>
					<div class="valid valid_3"></div>
				</div>
				<label>Email*</label>
				<div class="flex_row_space_between input">
					<input type="text" id="smail" class="input_type" name="enmail" autocomplete="off"  minlength="5" maxlength="70" required>
					<div class="valid  valid_4"></div>
				</div>
				<label>Password*</label>
				<div class="flex_row_space_between input">
					<input type="password" id="spw" class="input_type" name="enpw" autocomplete="off"  minlength="4" maxlength="50" required>
					<div class="valid  valid_5"></div>
				</div>
				<label>Confirm Password*</label>
				<div class="flex_row_space_between input">
					<input type="password" id="scpw" class="input_type" name="cfpw" autocomplete="off" minlength="4" maxlength="50" required>
					<div class="valid valid_6"></div>
				</div>
			</div>
			<button id="upbtn" class="google_sans blue_button"  style="border: none; font-size: 15px;" data-callback='onSubmit'>sign up</button>
			<div class="flex_row_space_between">
				<div class="offer" style="cursor: pointer;" onclick="tab();">SIGN IN ACCOUNT</div>
				<div class="offer"></div>
			</div>
		</form>
	</div>
</div>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>   
   function onSubmit(token) {
     document.getElementById("up").submit();
   }
</script>
<script type="text/javascript">
	function _(e) {
		return document.getElementById(e);
	}
	function $(c, n) {
		return document.getElementsByClassName(c)[n];
	}	
	function true_or_false(match, classes, n) {
		if (!match) {
			$(classes, n).style.color = "#ff0000";
			$(classes, n).innerHTML = "!";			
		}else {
			$(classes, n).style.color = "#00ff00";
			$(classes, n).innerHTML = "☑";
		}
	}
	function mailchar(email) {
		var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
		return filter.test(email);
	}
	function passchar(pass) {
		var filter = /^([a-zA-Z0-9_%@!?]*)+$/;
		return filter.test(pass);
	}
	function namechar(name) {
		var filter = /^([a-zA-Z0-9_.]*)$/;
		return filter.test(name);
	}
	function isSame(a) {
		if (_(a[0]).value === _(a[1]).value) {
			return true;
		}else {
			return false;
		}
	}
	function dd(a, b) {
		if (isSame([a, b])) {
			return true;
		}else{
			return false;
		}
	}
	function EventHandler(id, cl, n, fun) {
		_(id).addEventListener('blur', function () {true_or_false(fun(_(id).value), cl, n)}, false);		
	}
	function SameHandler(id, array, cl, n, fun) {
		_(id).addEventListener('blur', function () {true_or_false(fun(array), cl, n)}, false);			
	}
	EventHandler('lun', 'valid valid_1', 0, mailchar); //lun - login inputs
	EventHandler('lpw', 'valid valid_2', 0, passchar); //lpw - login password
	EventHandler('sun', 'valid valid_3', 0, namechar); //sun - signup username
	EventHandler('smail', 'valid valid_4', 0, mailchar); //smail - signup email
	EventHandler('spw', 'valid valid_5', 0, passchar); //spw - signup password
	SameHandler('scpw', ['scpw', 'spw'], 'valid valid_6', 0, isSame); //scpw - signup password confirmation
	
</script>
</body>
</html>