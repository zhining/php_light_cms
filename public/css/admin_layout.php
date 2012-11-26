<?php
header('Content-type: text/css');
?>

/* Essentials */
html,div,map,dt,isindex,form,header,aside,section,section,article,footer {
	display: block;
}
html,body {
	height: 100%;
	margin: 0;
	padding: 0;
	font-family: "Helvetica Neue",Helvetica,Arial,Verdana,sans-serif;
	background: #F8F8F8;
	font-size: 12px;
    font-family: Microsoft YaHei, SimSun, sans-serif;
}
.clear {
	clear: both;
}
.spacer {
	height: 20px;
}
a: link,a: visited {
	color: #77BACE;
	text-decoration: none;
}
a: hover {
	text-decoration: underline;
}
p {
    margin: 0.5em;
}
ul {
    margin: 1em 2em;
}
li {
    margin: 0.5em 1em; 
}
/* Header */
header#header {
	height: 55px;
	width: 100%;
	background: #222222 url(../images/admin/header_bg.png) repeat-x;
}
header#header h1.site_title,header#header h2.section_title {
	float: left;
	margin: 0;
	font-size: 22px;
	display: block;
	width: 20%;
	height: 55px;
	font-weight: normal;
	text-align: left;
	text-indent: 1.8%;
	line-height: 55px;
	color: #fff;
	text-shadow: 0 -1px 0 #000;
    font-family: SimSun;
}
header#header h1.site_title a {
	color: #fff;
	text-decoration: none;
}
header#header h2.section_title {
	text-align: center;
	text-indent: 4.5%;
	width: 68%;
	background: url(../images/admin/header_shadow.png) no-repeat left top;
}
.btn_view_site {
	float: left;
	width: 9%;
}
.btn_view_site a {
	display: block;
	margin-top: 12px;
	width: 91px;
	height: 27px;
	background: url(../images/admin/btn_view_site.png) no-repeat;
	text-align: center;
	line-height: 29px;
	color: #fff;
	text-decoration: none;
	text-shadow: 0 -1px 0 #000;
}
.btn_view_site a: hover {
	background-position: 0 -27px;
}
/* Secondary Header Bar */
section#secondary_bar {
	height: 38px;
	width: 100%;
	background: #F1F1F4 url(../images/admin/secondary_bar.png) repeat-x;
}
section#secondary_bar .user {
	float: left;
	width: 20%;
	height: 38px;
}
.user p {
	margin: 0;
	padding: 0;
	color: #666666;
	font-weight: bold;
	display: block;
	float: left;
	width: 85%;
	height: 35px;
	line-height: 35px;
	text-indent: 25px;
	text-shadow: 0 1px 0 #fff;
	background: url(../images/admin/icn_user.png) no-repeat center left;
	margin-left: 6%;
}
.user a {
	text-decoration: none;
	color: #666666
}
.user a: hover {
	color: #77BACE;
}
.user a.logout_user {
	float: left;
	display: block;
	width: 16px;
	height: 35px;
	text-indent: -5000px;
	background: url(../images/admin/icn_logout.png) center no-repeat;
}
/* Breadcrumbs */
section#secondary_bar .breadcrumbs_container {
	float: left;
	width: 80%;
	background: url(../images/admin/secondary_bar_shadow.png) no-repeat left top;
	height: 38px;
}
article.breadcrumbs {
	float: left;
	padding: 0 10px;
	border: 1px solid #ccc;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 0 #fff;
	-moz-box-shadow: 0 1px 0 #fff;
	box-shadow: 0 1px 0 #fff;
	height: 23px;
	margin: 4px 3%;
}
.breadcrumbs a {
	display: inline-block;
	float: left;
	height: 24px;
	line-height: 23px;
}
.breadcrumbs a.current,.breadcrumbs a.current: hover {
	color: #9E9E9E;
	font-weight: bold;
	text-shadow: 0 1px 0 #fff;
	text-decoration: none;
}
.breadcrumbs a: link,.breadcrumbs a: visited {
	color: #44474F;
	text-decoration: none;
	text-shadow: 0 1px 0 #fff;
	font-weight: bold;
}
.breadcrumbs a: hover {
	color: #222222;
}
.breadcrumb_divider {
	display: inline-block;
	width: 12px;
	height: 24px;
	background: url(../images/admin/breadcrumb_divider.png) no-repeat;
	float: left;
	margin: 0 5px;
}
/* Sidebar */
aside#sidebar {
	width: 20%;
	background: #E0E0E3 url(../images/admin/sidebar.png) repeat;
	float: left;
	min-height: 500px;
	margin-top: -4px;
}
#sidebar hr {
	border: none;
	outline: none;
	background: url(../images/admin/sidebar_divider.png) repeat-x;
	display: block;
	width: 100%;
	height: 2px;
}
aside#sidebar footer {
    padding: 1em 0;
}
/* Search */
.quick_search {
	text-align: center;
	padding: 14px 0 10px 0;
}
.quick_search input[type=text] {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border: 1px solid #bbb;
	width: 70%;
	color: #ccc;
	-webkit-box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	-moz-box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	text-indent: 30px;
	background: #fff url(../images/admin/icn_search.png) no-repeat;
	background-position: 10px 6px;
	padding-left: 15px;
}
.quick_search input[type=text]: focus {
	outline: none;
	color: #666666;
	border: 1px solid #77BACE;
	-webkit-box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
	-moz-box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
	box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
}
/* Sidebar Menu */
#sidebar h3 {
	color: #1F1F20;
	text-transform: uppercase;
	text-shadow: 0 1px 0 #fff;
	font-size: 13px;
	margin: 10px 0 10px 6%;
	display: block;
	float: left;
	width: 90%;
}
.toggleLink {
	color: #999999;
	font-size: 10px;
	text-decoration: none;
	display: block;
	float: right;
	margin-right: 2%
}
#sidebar .toggleLink: hover {
	color: #77BACE;
	text-decoration: none;
}
#sidebar ul {
	clear: both;
	margin: 0;
	padding: 0;
}
#sidebar li {
	list-style: none;
	margin: 2% 0 0 12%;
	padding: 0;
}
#sidebar li a {
	color: #666666;
	padding-left: 25px;
	text-decoration: none;
	display: inline-block;
	height: 17px;
	line-height: 17px;
	text-shadow: 0 1px 0 #fff;
	margin: 2px 0;
}
#sidebar li a: hover {
	color: #444444;
}
/* Sidebar Icons */
li.icn_new_article a {
	background: url(../images/admin/icn_new_article.png) no-repeat center left;
}
li.icn_edit_article a {
	background: url(../images/admin/icn_edit_article.png) no-repeat center left;
}
li.icn_categories a {
	background: url(../images/admin/icn_categories.png) no-repeat center left;
}
li.icn_tags a {
	background: url(../images/admin/icn_tags.png) no-repeat center left;
}
li.icn_add_user a {
	background: url(../images/admin/icn_add_user.png) no-repeat center left;
}
li.icn_view_users a {
	background: url(../images/admin/icn_view_users.png) no-repeat center left;
}
li.icn_profile a {
	background: url(../images/admin/icn_profile.png) no-repeat center left;
}
li.icn_folder a {
	background: url(../images/admin/icn_folder.png) no-repeat center left;
}
li.icn_photo a {
	background: url(../images/admin/icn_photo.png) no-repeat center left;
}
li.icn_audio a {
	background: url(../images/admin/icn_audio.png) no-repeat center left;
}
li.icn_video a {
	background: url(../images/admin/icn_video.png) no-repeat center left;
}
li.icn_settings a {
	background: url(../images/admin/icn_settings.png) no-repeat center left;
}
li.icn_security a {
	background: url(../images/admin/icn_security.png) no-repeat center left;
}
li.icn_jump_back a {
	background: url(../images/admin/icn_jump_back.png) no-repeat center left;
}
#sidebar p {
	color: #666666;
	padding-left: 6%;
	text-shadow: 0 1px 0 #fff;
	margin: 10px 0 0 0;
}
#sidebar a {
	color: #666666;
	text-decoration: none;
}
#sidebar a: hover {
	text-decoration: underline;
}
#sidebar footer {
	margin-top: 20%;
}
/* Main Content */
section#main {
	width: 80%;
	min-height: 500px;
	background: url(../images/admin/sidebar_shadow.png) repeat-y left top;
	float: left;
	margin-top: -2px;

}
#main h3 {
	color: #1F1F20;
	text-transform: uppercase;
	text-shadow: 0 1px 0 #fff;
	font-size: 13px;
	margin: 8px 20px;
}
/* Modules */
.module {
	border: 1px solid #9BA0AF;
	width: 90%;
	margin: 20px 3% 0 3%;
	margin-top: 20px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	background: #ffffff;
	padding-bottom: 1.5em;
}
#main .module header h3 {
	display: block;
	width: 90%;
	float: left;
}
.module header {
	height: 38px;
	width: 100%;
	background: #F1F1F4 url(../images/admin/secondary_bar.png) repeat-x;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
}
.module footer {
	height: 32px;
	width: 100%;
	border-top: 1px solid #9CA1B0;
	background: #F1F1F4 url(../images/admin/module_footer_bg.png) repeat-x;
	-webkit-border-bottom-left-radius: 5px;
	-webkit-border-bottom-right-radius: 5px;
	-moz-border-radius-bottomleft: 5px;
	-moz-border-radius-bottomright: 5px;
	-webkit-border-bottom-left-radius: 5px;
	-webkit-border-bottom-right-radius: 5px;
}
.module_content {
	margin: 10px 20px;
	color: #666;
}
/* Module Widths */
.width_full {
	width: 95%;
}
.width_half {
	width: 46%;
	margin-right: 0;
	float: left;
}
.width_quarter {
	width: 26%;
	margin-right: 0;
	float: left;
}
.width_3_quarter {
	width: 66%;
	margin-right: 0;
	float: left;
}
/* Stats Module */
.stats_graph {
	width: 64%;
	float: left;
}
.stats_overview {
	background: #F6F6F6;
	border: 1px solid #ccc;
	float: right;
	width: 26%;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
}
.overview_today,.overview_previous {
	width: 50%;
	float: left;
}
.stats_overview p {
	margin: 0;
	padding: 0;
	text-align: center;
	text-transform: uppercase;
	text-shadow: 0 1px 0 #fff;
}
.stats_overview p.overview_day {
	font-size: 12px;
	font-weight: bold;
	margin: 6px 0;
}
.stats_overview p.overview_count {
	font-size: 26px;
	font-weight: bold;
	color: #333333;
}
.stats_overview p.overview_type {
	font-size: 10px;
	color: #999999;
	margin-bottom: 8px
}
/* Content Manager */
.tablesorter {
	width: 100%;
	margin: -5px 0 0 0;
}
.tablesorter tr:nth-child(2n) {
	background: #F3F3F3; 
}
.tablesorter td {
	margin: 0;
	padding: 0;
	border-bottom: 1px dotted #ccc;
}
.tablesorter thead tr {
	height: 34px;
	background: url(../images/admin/table_sorter_header.png) repeat-x;
	text-align: left;
	text-indent: 10px;
	cursor: pointer;
}
.tablesorter th {
    vertical-align: middle;
}
.tablesorter td {
	padding: 10px 10px 5px 10px;
	min-width: 100px;
	max-width: 200px;
	overflow: hidden;
}
.tablesorter input[type=image] {
	margin-right: 10px;
}
ul.tabs {
	margin: 10px 10px 5px 0;
	padding: 0;
	float: right;
	list-style: none;
	
	/*--Set height of tabs--*/
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	-webkit-box-shadow: 0 1px 0 #fff;
	-moz-box-shadow: 0 1px 0 #fff;
	box-shadow: 0 1px 0 #fff;
	border: 1px solid #ccc;
	font-weight: bold;
	text-shadow: 0 1px 0 #fff;
}
ul.tabs li {
	float: left;
	margin: 0;
	padding: 0;
	line-height: 24px;
}
ul.tabs li a {
	text-decoration: none;
	color: #999;
	display: block;
	padding: 5px 10px 1px 10px;
	height: 24px;
}
ul.tabs li a:hover {
	color: #44474F;
	background: #E7E7E7;
}
html ul.tabs li.active a {
	color: #44474F;
}
html ul.tabs li.active,html ul.tabs li.active a: hover {
	background: #F1F2F4;
	-webkit-box-shadow: inset 0 2px 3px #818181;
	-moz-box-shadow: inset 0 2px 3px #818181;
	box-shadow: inset 0 2px 3px #818181;
}
html ul.tabs li: first-child,html ul.tabs li: first-child a {
	-webkit-border-top-left-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-bottomleft: 5px;
	border-top-left-radius: 5px;
	border-bottom-left-radius: 5px;
}
html ul.tabs li: last-child,html ul.tabs li: last-child a {
	-webkit-border-top-right-radius: 5px;
	-webkit-border-bottom-right-radius: 5px;
	-moz-border-radius-topright: 5px;
	-moz-border-radius-bottomright: 5px;
	border-top-right-radius: 5px;
	border-bottom-right-radius: 5px;
}
#main .module header h3.tabs_involved {
	display: block;
	width: 60%;
	float: left;
}
/* Messages */
.message {
	border-bottom: 1px dotted #cccccc;
}
.post_message {
	text-align: left;
	padding: 5px 0;
}
.post_message input[type=text] {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border: 1px solid #bbb;
	height: 20px;
	width: 70%;
	color: #ccc;
	-webkit-box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	-moz-box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	text-indent: 10px;
	background-position: 10px 6px;
	float: left;
	margin: 0 3.5%;
}
.post_message input[type=text]: focus {
	outline: none;
	border: 1px solid #77BACE;
	-webkit-box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
	-moz-box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
	box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
	color: #666666;
}
.post_message input[type=image] {
	float: left;
}
.message_list {
	height: 250px;
	overflow-x: hidden;
	overflow-y: scroll;
}
/* New/Edit Article Module */
fieldset {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	background: #F6F6F6;
	border: 1px solid #ccc;
	padding: 1% 0%;
	margin: 10px 0;
}
fieldset label {
	display: block;
	float: left;
	width: 200px;
	height: 25px;
	line-height: 25px;
	text-shadow: 0 1px 0 #fff;
	font-weight: bold;
	padding-left: 10px;
	margin: -5px 0 5px 0;
	text-transform: uppercase;
}
fieldset input[type=text] {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border: 1px solid #BBBBBB;
	height: 20px;
	color: #666666;
	-webkit-box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	-moz-box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	padding-left: 10px;
	background-position: 10px 6px;
	margin: 0;
	display: block;
	float: left;
	width: 96%;
	margin: 0 10px;
}
fieldset input[type=text]: focus {
	outline: none;
	border: 1px solid #77BACE;
	-webkit-box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
	-moz-box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
	box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
}
fieldset select {
	width: 96%;
	margin: 0 10px;
	border: 1px solid #bbb;
	height: 20px;
	color: #666666;
}
fieldset textarea {
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	border: 1px solid #BBBBBB;
	color: #666666;
	-webkit-box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	-moz-box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	box-shadow: inset 0 2px 2px #ccc,0 1px 0 #fff;
	padding-left: 10px;
	background-position: 10px 6px;
	margin: 0 0.5%;
	display: block;
	float: left;
	width: 96%;
	margin: 0 10px;
}
fieldset textarea: focus {
	outline: none;
	border: 1px solid #77BACE;
	-webkit-box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
	-moz-box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
	box-shadow: inset 0 2px 2px #ccc,0 0 10px #ADDCE6;
}
.submit_link {
	float: right;
	margin-right: 3%;
	padding: 5px 0;
}
.submit_link select {
	width: 150px;
	border: 1px solid #bbb;
	height: 20px;
	color: #666666;
}
#main .module_content h1 {
	color: #333333;
	text-transform: none;
	text-shadow: 0 1px 0 #fff;
	font-size: 22px;
	margin: 8px 0px;
}
#main .module_content h2 {
	color: #444444;
	text-transform: none;
	text-shadow: 0 1px 0 #fff;
	font-size: 18px;
	margin: 8px 0px;
}
#main .module_content h3 {
	color: #666666;
	text-transform: uppercase;
	text-shadow: 0 1px 0 #fff;
	font-size: 13px;
	margin: 8px 0px;
}
#main .module_content h4 {
	color: #666666;
	text-transform: none;
	text-shadow: 0 1px 0 #fff;
	font-size: 13px;
	margin: 8px 0px;
}
#main .module_content li {
	line-height: 150%;
}
/* Alerts */
#main h4.alert_info {
	display: block;
	width: 95%;
	margin: 20px 3% 0 3%;
	margin-top: 20px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	background: #B5E5EF url(../images/admin/icn_alert_info.png) no-repeat;
	background-position: 10px 10px;
	border: 1px solid #77BACE;
	color: #082B33;
	padding: 10px 0;
	text-indent: 40px;
	font-size: 14px;
}
#main h4.alert_warning {
	display: block;
	width: 95%;
	margin: 20px 3% 0 3%;
	margin-top: 20px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	background: #F5F3BA url(../images/admin/icn_alert_warning.png) no-repeat;
	background-position: 10px 10px;
	border: 1px solid #C7A20D;
	color: #796616;
	padding: 10px 0;
	text-indent: 40px;
	font-size: 14px;
}
#main h4.alert_error {
	display: block;
	width: 95%;
	margin: 20px 3% 0 3%;
	margin-top: 20px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	background: #F3D9D9 url(../images/admin/icn_alert_error.png) no-repeat;
	background-position: 10px 10px;
	border: 1px solid #D20009;
	color: #7B040F;
	padding: 10px 0;
	text-indent: 40px;
	font-size: 14px;
}
#main h4.alert_success {
	display: block;
	width: 95%;
	margin: 20px 3% 0 3%;
	margin-top: 20px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	background: #E2F6C5 url(../images/admin/icn_alert_success.png) no-repeat;
	background-position: 10px 10px;
	border: 1px solid #79C20D;
	color: #32510F;
	padding: 10px 0;
	text-indent: 40px;
	font-size: 14px;
}
.tab_container td, .tab_container th {
    text-align: center;
}
.submit_button {
    background: rgb(255,255,255); /* Old browsers */
    /* IE9 SVG, needs conditional override of 'filter' to 'none' */
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUwJSIgc3RvcC1jb2xvcj0iI2YxZjFmMSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjUyJSIgc3RvcC1jb2xvcj0iI2UxZTFlMSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmNmY2ZjYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(241,241,241,1) 50%, rgba(225,225,225,1) 52%, rgba(246,246,246,1) 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(50%,rgba(241,241,241,1)), color-stop(52%,rgba(225,225,225,1)), color-stop(100%,rgba(246,246,246,1))); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 52%,rgba(246,246,246,1) 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 52%,rgba(246,246,246,1) 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 52%,rgba(246,246,246,1) 100%); /* IE10+ */
    background: linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(241,241,241,1) 50%,rgba(225,225,225,1) 52%,rgba(246,246,246,1) 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0 ); /* IE6-8 */
    padding: 7px 10px;
    color: black;
    text-decoration: none;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    -ms-border-radius: 3px;
    border: 1px solid #bbb;
    margin-right: 15px;
}
.submit_button:hover {
    background: rgb(255,255,255); /* Old browsers */
    /* IE9 SVG, needs conditional override of 'filter' to 'none' */
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjQ5JSIgc3RvcC1jb2xvcj0iI2M5YzljOSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmNmY2ZjYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-linear-gradient(top,  rgba(255,255,255,1) 0%, rgba(201,201,201,1) 49%, rgba(246,246,246,1) 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,1)), color-stop(49%,rgba(201,201,201,1)), color-stop(100%,rgba(246,246,246,1))); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(201,201,201,1) 49%,rgba(246,246,246,1) 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(201,201,201,1) 49%,rgba(246,246,246,1) 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(201,201,201,1) 49%,rgba(246,246,246,1) 100%); /* IE10+ */
    background: linear-gradient(top,  rgba(255,255,255,1) 0%,rgba(201,201,201,1) 49%,rgba(246,246,246,1) 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0 ); /* IE6-8 */
}
