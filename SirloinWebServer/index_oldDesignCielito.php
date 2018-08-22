<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<title>Sirloin Stockade, Programa de Puntos</title>
<link rel="shortcut icon" href="images/favicon.png" />
<!-- Estilos -->
<link
	href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800"
	rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="css/font-awesome.css" />
<link rel="stylesheet" href="css/estilos_misc.css" />
<link rel="stylesheet" href="css/estilos_style.css" />
<link rel="stylesheet" href="css/main.css" />
<link rel="stylesheet" href="css/promo.css" />
<link rel="stylesheet" href="css/carousel.css" />
<link rel="stylesheet" href="css/animate.css" media="all" />
<link rel="stylesheet" href="css/hover.css" media="all" />
<link href="css/nivo-lightbox.css" rel="stylesheet" />
<link href="css/nivo-lightbox-theme/default/default.css"
	rel="stylesheet" type="text/css" />
<link rel="stylesheet"
	href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" />
<!--JQuery-->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"
	type="text/javascript"></script>
<script src="js/DataTable.js" type="text/javascript"></script>
</head>
<?php
header ( 'Content-Type: text/html; charset=ISO-8859-1' );
?>
<!-- javascript:return false;-->
<body data-spy="scroll">
	<form method="post" action="#"
		onsubmit="javascript:return WebForm_OnSubmit();" id="form1">
		<div class="aspNetHidden">
			<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
			<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT"
				value="" /> <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE"
				value="/wEPDwUKMjA1MzQyNTc5OA9kFgJmD2QWAgIDD2QWCAIBD2QWBmYPZBYEAgEPFgIeB1Zpc2libGVoZAIDDxYCHglpbm5lcmh0bWwFjhE8ZGl2IGlkPSdtYWluLXNsaWRlcicgY2xhc3M9J2Nhcm91c2VsIHNsaWRlJyBkYXRhLXJpZGU9J2Nhcm91c2VsJz48b2wgY2xhc3M9J2Nhcm91c2VsLWluZGljYXRvcnMgaGlkZGVuLXhzJz48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nMCcgY2xhc3M9J2FjdGl2ZSc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nMSc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nMic+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nMyc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nNCc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nNSc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nNic+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nNyc+PC9saT48L29sPjxkaXYgY2xhc3M9J2Nhcm91c2VsLWlubmVyJyBvbmRyYWdzdGFydD0ncmV0dXJuIGZhbHNlOycgb25jb250ZXh0bWVudT0ncmV0dXJuIGZhbHNlOyc+PGRpdiBjbGFzcz0naXRlbSBhY3RpdmUnPjxhIGhyZWY9J2h0dHA6Ly93d3cuY2llbGl0b3F1ZXJpZG8uY29tLm14JyB0YXJnZXQ9J19ibGFuayc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTEyLmpwZycgYWx0PSdzbGlkZXInPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdpdGVtJz48YSBocmVmPSdodHRwOi8vd3d3LmNpZWxpdG9xdWVyaWRvLmNvbS5teC8nIHRhcmdldD0nX2JsYW5rJz48aW1nIGNsYXNzPSdpbWctcmVzcG9uc2l2ZScgc3JjPSdpbWFnZXMvc2xpZGVyL3NsaWRlMTEucG5nJyBhbHQ9J3NsaWRlcic+PC9hPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxhIGhyZWY9J2h0dHA6Ly93d3cuY2llbGl0b3F1ZXJpZG8uY29tLm14LycgdGFyZ2V0PSdfYmxhbmsnPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUxMC5qcGcnIGFsdD0nc2xpZGVyJz48L2E+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTEuanBnJyBhbHQ9J3NsaWRlcic+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTIuanBnJyBhbHQ9J3NsaWRlcic+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTMuanBnJyBhbHQ9J3NsaWRlcic+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGEgaHJlZj0naHR0cDovL3d3dy5jaWVsaXRvcXVlcmlkby5jb20ubXgvJyB0YXJnZXQ9J19ibGFuayc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTQuanBnJyBhbHQ9J3NsaWRlcic+PC9hPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxhIGhyZWY9J2h0dHA6Ly93d3cuY2llbGl0b3F1ZXJpZG8uY29tLm14LycgdGFyZ2V0PSdfYmxhbmsnPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGU1LmpwZycgYWx0PSdzbGlkZXInPjwvYT48L2Rpdj48L2Rpdj48YSBocmVmPScjbWFpbi1zbGlkZXInIGNsYXNzPSdsZWZ0IGNhcm91c2VsLWNvbnRyb2wnIHJvbGU9J2J1dHRvbicgZGF0YS1zbGlkZT0ncHJldic+IDxzcGFuIGNsYXNzPSdnbHlwaGljb24gZ2x5cGhpY29uLWNoZXZyb24tbGVmdCcgYXJpYS1oaWRkZW49J3RydWUnPjwvc3Bhbj4gPHNwYW4gY2xhc3M9J3NyLW9ubHknPkFudGVyaW9yPC9zcGFuPjwvYT4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxhIGhyZWY9JyNtYWluLXNsaWRlcicgY2xhc3M9J3JpZ2h0IGNhcm91c2VsLWNvbnRyb2wnIHJvbGU9J2J1dHRvbicgZGF0YS1zbGlkZT0nbmV4dCc+PHNwYW4gY2xhc3M9J2dseXBoaWNvbiBnbHlwaGljb24tY2hldnJvbi1yaWdodCcgYXJpYS1oaWRkZW49J3RydWUnPjwvc3Bhbj48c3BhbiBjbGFzcz0nc3Itb25seSc+U2lndWllbnRlPC9zcGFuPjwvYT48L2Rpdj5kAgEPFgIfAGgWBAILDxYCHwEFjhE8ZGl2IGlkPSdtYWluLXNsaWRlcicgY2xhc3M9J2Nhcm91c2VsIHNsaWRlJyBkYXRhLXJpZGU9J2Nhcm91c2VsJz48b2wgY2xhc3M9J2Nhcm91c2VsLWluZGljYXRvcnMgaGlkZGVuLXhzJz48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nMCcgY2xhc3M9J2FjdGl2ZSc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nMSc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nMic+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nMyc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nNCc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nNSc+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nNic+PC9saT48bGkgZGF0YS10YXJnZXQ9JyNtYWluLXNsaWRlcicgZGF0YS1zbGlkZS10bz0nNyc+PC9saT48L29sPjxkaXYgY2xhc3M9J2Nhcm91c2VsLWlubmVyJyBvbmRyYWdzdGFydD0ncmV0dXJuIGZhbHNlOycgb25jb250ZXh0bWVudT0ncmV0dXJuIGZhbHNlOyc+PGRpdiBjbGFzcz0naXRlbSBhY3RpdmUnPjxhIGhyZWY9J2h0dHA6Ly93d3cuY2llbGl0b3F1ZXJpZG8uY29tLm14JyB0YXJnZXQ9J19ibGFuayc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTEyLmpwZycgYWx0PSdzbGlkZXInPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdpdGVtJz48YSBocmVmPSdodHRwOi8vd3d3LmNpZWxpdG9xdWVyaWRvLmNvbS5teC8nIHRhcmdldD0nX2JsYW5rJz48aW1nIGNsYXNzPSdpbWctcmVzcG9uc2l2ZScgc3JjPSdpbWFnZXMvc2xpZGVyL3NsaWRlMTEucG5nJyBhbHQ9J3NsaWRlcic+PC9hPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxhIGhyZWY9J2h0dHA6Ly93d3cuY2llbGl0b3F1ZXJpZG8uY29tLm14LycgdGFyZ2V0PSdfYmxhbmsnPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUxMC5qcGcnIGFsdD0nc2xpZGVyJz48L2E+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTEuanBnJyBhbHQ9J3NsaWRlcic+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTIuanBnJyBhbHQ9J3NsaWRlcic+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTMuanBnJyBhbHQ9J3NsaWRlcic+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGEgaHJlZj0naHR0cDovL3d3dy5jaWVsaXRvcXVlcmlkby5jb20ubXgvJyB0YXJnZXQ9J19ibGFuayc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTQuanBnJyBhbHQ9J3NsaWRlcic+PC9hPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxhIGhyZWY9J2h0dHA6Ly93d3cuY2llbGl0b3F1ZXJpZG8uY29tLm14LycgdGFyZ2V0PSdfYmxhbmsnPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGU1LmpwZycgYWx0PSdzbGlkZXInPjwvYT48L2Rpdj48L2Rpdj48YSBocmVmPScjbWFpbi1zbGlkZXInIGNsYXNzPSdsZWZ0IGNhcm91c2VsLWNvbnRyb2wnIHJvbGU9J2J1dHRvbicgZGF0YS1zbGlkZT0ncHJldic+IDxzcGFuIGNsYXNzPSdnbHlwaGljb24gZ2x5cGhpY29uLWNoZXZyb24tbGVmdCcgYXJpYS1oaWRkZW49J3RydWUnPjwvc3Bhbj4gPHNwYW4gY2xhc3M9J3NyLW9ubHknPkFudGVyaW9yPC9zcGFuPjwvYT4NCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxhIGhyZWY9JyNtYWluLXNsaWRlcicgY2xhc3M9J3JpZ2h0IGNhcm91c2VsLWNvbnRyb2wnIHJvbGU9J2J1dHRvbicgZGF0YS1zbGlkZT0nbmV4dCc+PHNwYW4gY2xhc3M9J2dseXBoaWNvbiBnbHlwaGljb24tY2hldnJvbi1yaWdodCcgYXJpYS1oaWRkZW49J3RydWUnPjwvc3Bhbj48c3BhbiBjbGFzcz0nc3Itb25seSc+U2lndWllbnRlPC9zcGFuPjwvYT48L2Rpdj5kAg8PFgIeBVZhbHVlBQExZAICDxYCHwFlZAIDD2QWAgIBDxYEHwFlHwBoZAIHD2QWAmYPZBYIAhsPEGQQFSAKU2VsZWNjaW9uZQExATIBMwE0ATUBNgE3ATgBOQIxMAIxMQIxMgIxMwIxNAIxNQIxNgIxNwIxOAIxOQIyMAIyMQIyMgIyMwIyNAIyNQIyNgIyNwIyOAIyOQIzMAIzMRUgAi0xATEBMgEzATQBNQE2ATcBOAE5AjEwAjExAjEyAjEzAjE0AjE1AjE2AjE3AjE4AjE5AjIwAjIxAjIyAjIzAjI0AjI1AjI2AjI3AjI4AjI5AjMwAjMxFCsDIGdnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZGQCIw8QZBAVWgpTZWxlY2Npb25lBDIwMDUEMjAwNAQyMDAzBDIwMDIEMjAwMQQyMDAwBDE5OTkEMTk5OAQxOTk3BDE5OTYEMTk5NQQxOTk0BDE5OTMEMTk5MgQxOTkxBDE5OTAEMTk4OQQxOTg4BDE5ODcEMTk4NgQxOTg1BDE5ODQEMTk4MwQxOTgyBDE5ODEEMTk4MAQxOTc5BDE5NzgEMTk3NwQxOTc2BDE5NzUEMTk3NAQxOTczBDE5NzIEMTk3MQQxOTcwBDE5NjkEMTk2OAQxOTY3BDE5NjYEMTk2NQQxOTY0BDE5NjMEMTk2MgQxOTYxBDE5NjAEMTk1OQQxOTU4BDE5NTcEMTk1NgQxOTU1BDE5NTQEMTk1MwQxOTUyBDE5NTEEMTk1MAQxOTQ5BDE5NDgEMTk0NwQxOTQ2BDE5NDUEMTk0NAQxOTQzBDE5NDIEMTk0MQQxOTQwBDE5MzkEMTkzOAQxOTM3BDE5MzYEMTkzNQQxOTM0BDE5MzMEMTkzMgQxOTMxBDE5MzAEMTkyOQQxOTI4BDE5MjcEMTkyNgQxOTI1BDE5MjQEMTkyMwQxOTIyBDE5MjEEMTkyMAQxOTE5BDE5MTgEMTkxNxVaAi0xBDIwMDUEMjAwNAQyMDAzBDIwMDIEMjAwMQQyMDAwBDE5OTkEMTk5OAQxOTk3BDE5OTYEMTk5NQQxOTk0BDE5OTMEMTk5MgQxOTkxBDE5OTAEMTk4OQQxOTg4BDE5ODcEMTk4NgQxOTg1BDE5ODQEMTk4MwQxOTgyBDE5ODEEMTk4MAQxOTc5BDE5NzgEMTk3NwQxOTc2BDE5NzUEMTk3NAQxOTczBDE5NzIEMTk3MQQxOTcwBDE5NjkEMTk2OAQxOTY3BDE5NjYEMTk2NQQxOTY0BDE5NjMEMTk2MgQxOTYxBDE5NjAEMTk1OQQxOTU4BDE5NTcEMTk1NgQxOTU1BDE5NTQEMTk1MwQxOTUyBDE5NTEEMTk1MAQxOTQ5BDE5NDgEMTk0NwQxOTQ2BDE5NDUEMTk0NAQxOTQzBDE5NDIEMTk0MQQxOTQwBDE5MzkEMTkzOAQxOTM3BDE5MzYEMTkzNQQxOTM0BDE5MzMEMTkzMgQxOTMxBDE5MzAEMTkyOQQxOTI4BDE5MjcEMTkyNgQxOTI1BDE5MjQEMTkyMwQxOTIyBDE5MjEEMTkyMAQxOTE5BDE5MTgEMTkxNxQrA1pnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dkZAJBDxYCHwBoFgICAQ8QZGQWAGQCWQ8WAh8AaGQCCQ9kFghmDxYCHwEF5As8ZGl2IGNsYXNzPSdjb2wtc20tNic+PGEgaHJlZj0naW1hZ2VzL3Byb21vdGlvbnMvcHJvbW85LmpwZycgZGF0YS1saWdodGJveC1nYWxsZXJ5PSdnYWxsZXJ5MSc+PGltZyBzcmM9J2ltYWdlcy9wcm9tb3Rpb25zL3Byb21vOS5qcGcnIGFsdD0nJyBjbGFzcz0naW1nLXJlc3BvbnNpdmUgaHZyLWdyb3ctc2hhZG93Jz48L2E+PGRpdiBjbGFzcz0nY29udF9wcm9tb19idG4nPjxkaXYgaWQ9J3NlZVByb21vMTEnIGNsYXNzPSdidG4tc2VlLXByb21vIGh2ci1zaW5rJz5WZXIgUHJvbW9jacOzbjwvZGl2PjwvZGl2PjwvZGl2PjxkaXYgY2xhc3M9J2NvbC1zbS02Jz48YSBocmVmPSdpbWFnZXMvcHJvbW90aW9ucy9wcm9tbzguanBnJyBkYXRhLWxpZ2h0Ym94LWdhbGxlcnk9J2dhbGxlcnkxJz48aW1nIHNyYz0naW1hZ2VzL3Byb21vdGlvbnMvcHJvbW84LmpwZycgYWx0PScnIGNsYXNzPSdpbWctcmVzcG9uc2l2ZSBodnItZ3Jvdy1zaGFkb3cnPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdici01Jz48L2Rpdj48ZGl2IGNsYXNzPSdjb2wtc20tNic+PGEgaHJlZj0naW1hZ2VzL3Byb21vdGlvbnMvcHJvbW83LmpwZycgZGF0YS1saWdodGJveC1nYWxsZXJ5PSdnYWxsZXJ5MSc+PGltZyBzcmM9J2ltYWdlcy9wcm9tb3Rpb25zL3Byb21vNy5qcGcnIGFsdD0nJyBjbGFzcz0naW1nLXJlc3BvbnNpdmUgaHZyLWdyb3ctc2hhZG93Jz48L2E+PC9kaXY+PGRpdiBjbGFzcz0nY29sLXNtLTYnPjxhIGhyZWY9J2ltYWdlcy9wcm9tb3Rpb25zL3Byb21vMS5qcGcnIGRhdGEtbGlnaHRib3gtZ2FsbGVyeT0nZ2FsbGVyeTEnPjxpbWcgc3JjPSdpbWFnZXMvcHJvbW90aW9ucy9wcm9tbzEuanBnJyBhbHQ9JycgY2xhc3M9J2ltZy1yZXNwb25zaXZlIGh2ci1ncm93LXNoYWRvdyc+PC9hPjwvZGl2PjxkaXYgY2xhc3M9J2JyLTUnPjwvZGl2PjxkaXYgY2xhc3M9J2NvbC1zbS02Jz48YSBocmVmPSdpbWFnZXMvcHJvbW90aW9ucy9wcm9tbzMuanBnJyBkYXRhLWxpZ2h0Ym94LWdhbGxlcnk9J2dhbGxlcnkxJz48aW1nIHNyYz0naW1hZ2VzL3Byb21vdGlvbnMvcHJvbW8zLmpwZycgYWx0PScnIGNsYXNzPSdpbWctcmVzcG9uc2l2ZSBodnItZ3Jvdy1zaGFkb3cnPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdjb2wtc20tNic+PGEgaHJlZj0naW1hZ2VzL3Byb21vdGlvbnMvcHJvbW80LmpwZycgZGF0YS1saWdodGJveC1nYWxsZXJ5PSdnYWxsZXJ5MSc+PGltZyBzcmM9J2ltYWdlcy9wcm9tb3Rpb25zL3Byb21vNC5qcGcnIGFsdD0nJyBjbGFzcz0naW1nLXJlc3BvbnNpdmUgaHZyLWdyb3ctc2hhZG93Jz48L2E+PC9kaXY+PGRpdiBjbGFzcz0nYnItNSc+PC9kaXY+PGRpdiBjbGFzcz0nY29sLXNtLTYnPjxhIGhyZWY9J2ltYWdlcy9wcm9tb3Rpb25zL3Byb21vMi5qcGcnIGRhdGEtbGlnaHRib3gtZ2FsbGVyeT0nZ2FsbGVyeTEnPjxpbWcgc3JjPSdpbWFnZXMvcHJvbW90aW9ucy9wcm9tbzIuanBnJyBhbHQ9JycgY2xhc3M9J2ltZy1yZXNwb25zaXZlIGh2ci1ncm93LXNoYWRvdyc+PC9hPjwvZGl2PmQCAQ8WAh8BZWQCAg8WAh8BBY0BPHNjcmlwdCB0eXBlPSd0ZXh0L2phdmFzY3JpcHQnPiQoZnVuY3Rpb24oKXskKCcjc2VlUHJvbW8xMScpLmNsaWNrKGZ1bmN0aW9uKCl7d2luZG93Lm9wZW4oJ2h0dHA6Ly93d3cuY2llbGl0b3F1ZXJpZG8uY29tLm14Jyk7fSk7fSk7PC9zY3JpcHQ+ZAIEDxYEHwFlHwBoZBgBBR5fX0NvbnRyb2xzUmVxdWlyZVBvc3RCYWNrS2V5X18WAgUZY3RsMDAkUmVnaXN0ZXIkQ2hrQnhBY2NlcAUbY3RsMDAkUmVnaXN0ZXIkQ2hrQnhQb2xpY2VzlROJghT5XrPSmIDkHSWqDDD7uPc=" />
		</div>

		<script type="text/javascript" src="js/userFunctions.js"></script>

		<script src="js/webresource1.js" type="text/javascript"></script>

		<script src="js/webresource2.js" type="text/javascript"></script>
		<script type="text/javascript">
//<![CDATA[
function WebForm_OnSubmit() {
	if (typeof(ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;	 
	return false;
}
//]]>
</script>

		<div class="aspNetHidden">

			<input type="hidden" name="__VIEWSTATEGENERATOR"
				id="__VIEWSTATEGENERATOR" value="8D0E13E6" /> <input type="hidden"
				name="__SCROLLPOSITIONX" id="__SCROLLPOSITIONX" value="0" /> <input
				type="hidden" name="__SCROLLPOSITIONY" id="__SCROLLPOSITIONY"
				value="0" />
		</div>


		<div id="Menu_cont_menu_anonymous">
			<div class="site-main" id="sTop" ondragstart="return false;"
				oncontextmenu="return false;">
				<div class="site-header">
					<div class="main-header">
						<div class="container-fluid">
							<div id="menu-wrapper">
								<div class="row">
									<div class="logo-movil hidden-md hidden-lg">
										<div class="logo_cielito_corazon">
											<a href="index.php"><img
												src="images/logo/logo_header_movil.png"></a>
										</div>
									</div>
									<div class="logoindex hidden-sm hidden-xs">
										<div class="logo_cielito_corazon">
											<a href="index.php"><img src="images/logo/logo_header.png"
												alt="" /></a>
										</div>
									</div>
									<!-- /.logo -->
									<div class="col-md-12 col-sm-12 main-menu menu-cielito">
										<center>
											<ul class="menu-first hidden-sm hidden-xs">
												<li><a href="#quees">Programa de Puntos</a></li>
												<li class="menu-bullet">|</li>
												<li><a href="#como">¿Cómo funciona?</a></li>
												<li class="menu-bullet">|</li>
												<li><a href="#promociones">Promociones</a></li>
												<li class="menu-bullet">|</li>
												<li><a href="#registro">Únete</a></li>
												<li class="menu-bullet">|</li>
												<li><a id="login" class="cursor">Iniciar Sesion</a></li>
												<li class="menu-bullet">|</li>
												<li><a href="#contact">Soporte</a></li>
											</ul>
										</center>
										<a href="#" class="toggle-menu visible-sm visible-xs"><i
											class="fa fa-bars"></i></a>
									</div>
									<!-- /.main-menu -->

								</div>
								<!-- /.row -->
							</div>
							<!-- /#menu-wrapper -->

							<div class="menu-responsive hidden-md hidden-lg">
								<ul>
									<li><a href="#quees">Programa de Puntos</a></li>
									<li><a href="#como">¿Cómo funciona?</a></li>
									<li><a href="#promociones">Promociones</a></li>
									<li><a href="#registro">Únete</a></li>
									<li><a id="login_mobile" class="cursor">Iniciar Sesión</a></li>
									<li><a href="#contact">Soporte</a></li>
									</li>
								</ul>
							</div>
							<!-- /.menu-responsive -->
						</div>
						<!-- /.container -->
					</div>
					<!-- /.main-header -->
				</div>
				<!-- /.site-header -->
				<div id="Menu_cont_main_slider">
					<div id='main-slider' class='carousel slide' data-ride='carousel'>
						<ol class='carousel-indicators hidden-xs'>
						<!-- POR VERIFICAR QUE SE INCREMENTEN: -->
						
							<?php 
							$dir = "images/promociones/";
							$imagenes = scandir ( $dir );
							$i=0;
							foreach ( $imagenes as $key => $val ) {
								
								// revisamos que sean jpg o png
								
								if (substr ( $val, - 3 ) == "png" || substr ( $val, - 3 ) == "jpg") {
									$act = ($i==0) ? " class='active'" : "";
									$li = " <li data-target='#main-slider' data-slide-to='$i' $act> </li>";
									echo "$li";
									$i++;									
								}
							}
							?>
<!-- 							<li data-target='#main-slider' data-slide-to='0' class='active'></li> -->
<!-- 							<li data-target='#main-slider' data-slide-to='1'></li> -->
<!-- 							<li data-target='#main-slider' data-slide-to='2'></li> -->
<!-- 							<li data-target='#main-slider' data-slide-to='3'></li> -->
							
						</ol>
						<div class='carousel-inner' ondragstart='return false;'
							oncontextmenu='return false;'>
							<?php 
							$dir = "images/promociones/";
							$a = "<a href='http://www.sirloindf.com/' target='_blank'>";
							$gal="data-lightbox-gallery='gallery1'";
							$cla="class='img-responsive' alt='slider' ";
// 							$act=" active";
							$imagenes = scandir ( $dir );
							$i=0;
							foreach ( $imagenes as $key => $val ) {
								
								// revisamos que sean jpg o png
								
								if (substr ( $val, - 3 ) == "png" || substr ( $val, - 3 ) == "jpg") {
									$act = ($i==0) ? " active" : "";
									$div = "<div class='item $act'>";
// 									echo "<br><H1> VEAMOS $i : $act </H1>";
									//echo "$key => $val ";
									echo "$div $a <img src='".$dir.$val."' $cla></a></div>";
									$i++;
									
								}
							}
							
							
							
							?>
<!-- 							<div class='item active'> -->
<!-- 								<a href='http://www.sirloindf.com/' target='_blank'><img -->
<!-- 									class='img-responsive' src='images/slider/slide1.jpg' -->
<!-- 									alt='slider'></a> -->
<!-- 							</div> -->
<!-- 							<div class='item'> -->
<!-- 								<a href='http://www.sirloindf.com/' target='_blank'><img -->
<!-- 									class='img-responsive' src='images/slider/slide2.jpg' -->
<!-- 									alt='slider'></a> -->
<!-- 							</div> -->
<!-- 							<div class='item'> -->
<!-- 								<a href='http://www.sirloindf.com/' target='_blank'><img -->
<!-- 									class='img-responsive' src='images/slider/slide3.jpg' -->
<!-- 									alt='slider'></a> -->
<!-- 							</div> -->
<!-- 							<div class='item'> -->
<!-- 								<img class='img-responsive' src='images/slider/slide4.jpg' -->
<!-- 									alt='slider'> -->
<!-- 							</div> -->
						</div>
						<a href='#main-slider' class='left carousel-control' role='button'
							data-slide='prev'> <span class='glyphicon glyphicon-chevron-left'
							aria-hidden='true'></span> <span class='sr-only'>Anterior</span></a>
						<a href='#main-slider' class='right carousel-control'
							role='button' data-slide='next'><span
							class='glyphicon glyphicon-chevron-right' aria-hidden='true'></span><span
							class='sr-only'>Siguiente</span></a>
					</div>
				</div>
				<div class="anchor"></div>
			</div>

		</div>
		<!--Termina Menu Principal Anonimo-->

		<!--Menu Principal del Cliente Logueado-->

		<!--Termina Menu Principal del Cliente Logueado-->

		<!--Modal Container-->
		<div id="Menu_cont_modals"></div>

		<script type="text/javascript" src="js/menu_logueado.js"></script>


		<!-- Login -->


		<script type="text/javascript">

    
		 $(function() {
		     $('#dont_have_account')['click'](function() {
		         $('html, body')['delay'](400)['animate']({
		             scrollTop: $('#register_session')['offset']()['top']
		         }, 2000)
		     })
		 });
		 $(function() {
		     $('#ModalRecoverPass')['on']('hidden.bs.modal', function() {
		         $('#Login_TbxEmail')['val']('');
		         $('#Login_RequiredFieldValidator1')['hide']();
		         $('#Login_RegularExpressionValidator1')['hide']()
		     })
		 });

		 function closePopup() {
		     $('#Login_cont_failure_msg')['removeClass']('fadeIn');
		     $('#Login_cont_failure_msg')['fadeOut']()
		 }

</script>

		<div class="br-5"></div>

		<div id="Login_Login_PnlLogin"
			onkeypress="javascript:return WebForm_FireDefaultButton(event, &#39;Login_Login_BtnSignIn&#39;)">

<!-- 			<center> -->
<!-- 				<img src="images/home/pleca01.png" class="img-responsive container" -->
<!-- 					ondragstart="return false;" oncontextmenu="return false;"> -->
<!-- 			</center> -->
			<div class="container" ondragstart="return false;"
				oncontextmenu="return false;">
				<div class="col-md-6 login-campo">
					<div class="br-4"></div>
					<center>
						<img src="images/home/ingresa.png" class="img-responsive">
					</center>
					<div class="br-2"></div>
					<div class="col-sm-12 valign">
						<input name="Login_Login_UserName" type="text"
							id="Login_Login_UserName" class="form-control"
							placeholder="Correo" /> <span id="Login_Login_UserNameRequired"
							class="error_required_login" style="display: none;">El correo
							electrónico es requerido.</span> <span
							id="Login_Login_RegularExpressionValidator1"
							class="error_required_login" style="display: none;">Formato de
							correo electrónico no válido</span>
					</div>
					<div class="br-3"></div>
					<div class="col-sm-12 valign">
						<input name="Login_Login_Password" type="password"
							id="Login_Login_Password" class="form-control"
							placeholder="Contrase&ntilde;a" /> <span
							id="Login_Login_PasswordRequired" class="error_required_login"
							style="display: none;">La contraseña es obligatoria.</span>
					</div>
					<div class="br-4-5"></div>
					<input type="submit" name="Login_Login_BtnSignIn"
						value="Iniciar sesi&oacute;n"
						onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;Login_Login_BtnSignIn&quot;, &quot;&quot;, true, &quot;ctl00$Login1&quot;, &quot;&quot;, false, true))"
						id="Login_Login_BtnSignIn" class="boton-login" />
					<div class="br-3"></div>
					<center>
						<a href="#ModalRecoverPass" data-toggle="modal"><span
							class="span-forget">Recuperar contraseña</span></a>
					</center>
				</div>
				<div class="col-md-6 login-campo">
					<center>
						<img src="images/home/registra.png" class="img-responsive">
					</center>
					<div class="botonmaxred text-center" id="dont_have_account">Crear
						Cuenta</div>
				</div>
			</div>

		</div>

		<div class="vacio"></div>


		<!--Recuperar contrasenia -->
		<div class="modal face" id="ModalRecoverPass"
			ondragstart="return false;" oncontextmenu="return false;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body text-center">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<br />
						<center>
							<img src="images/logo/logo_header_2.png" width="200" alt="">
						</center>
						<br />
						<h2 class="txtpopup text-center">Recuperación de contraseña</h2>
						<br /> <input name="Login_TbxEmail" type="text"
							id="Login_TbxEmail" class="tbx-recover-pass"
							placeholder="Correo electr&oacute;nico" /> <span
							id="Login_RequiredFieldValidator1" class="error_required_2"
							style="display: none;">Ingresa tu correo electrónico</span> <span
							id="Login_RegularExpressionValidator1" class="error_required_2"
							style="display: none;">El formato del correo electrónico no es
							válido</span>
						<div class="loading-progress"></div>


						<input type="submit" name="Login_BtnRecover" value="Recuperar"
							onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;Login_BtnRecover&quot;, &quot;&quot;, true, &quot;RecoverPass&quot;, &quot;&quot;, false, true))"
							id="Login_BtnRecover" class="boton" /> <br /> <br /> <br />
					</div>
				</div>
			</div>
		</div>
		<!---->

		<!--Layout (Que es?)-->


		<div id="quees_session"></div>
		<section class="content-section" id="quees"
			ondragstart="return false;" oncontextmenu="return false;">
			<div class="br-5"></div>
<!-- 			<center> -->
<!-- 				<img src="images/home/pleca03.png" class="img-responsive"> -->
<!-- 			</center> -->
			<div class="container">
				<div class="heading-section col-md-12 text-center">
					<h2 class="text-grey">
						<strong>¿Qué es el Programa de Puntos de Sirloin Stockade?</strong>
					</h2>
					<center>
						<img src="images/logo/logo_cielitoqc.png"
							class="cielito_logo_responsive" />
					</center>
					<br />
					<p class="text-strong text-justify">
						Porque nos gusta consentir, premiar y distinguir la fidelidad de
						nuestros Clientes más valiosos, creamos un Programa de Puntos a
						través de una tarjeta de fidelidad para recompensar tu
						preferencia, que tendrá grandes beneficios para ti. Podrás
						utilizar y gozar de tu Tarjeta de Programa de Puntos VIP y otros
						beneficios como descuentos, promociones, etc., exclusivamente en
						todas las sucursales del Restaurante <span class="span-red">Sirloin
							Stockade de la CDMX</span>.
					</p>
					<div class="clear"></div>
					<div class="row">
						<div class="col-sm-3">
							<center>
								<img src="images/iconos/accrue-points.png"
									class="img-responsive" width="160" />
							</center>
							<div class="br-4"></div>
							<span class="text-whatis">Acumulación de<br />Puntos
							</span>
							<div class="br-6 hidden-md hidden-lg"></div>
						</div>
						<div class="col-sm-3">
							<center>
								<img src="images/iconos/redeem-points.png"
									class="img-responsive" width="160" />
							</center>
							<div class="br-4"></div>
							<span class="text-whatis">Canje de<br />Puntos
							</span>
							<div class="br-6 hidden-md hidden-lg"></div>
						</div>
						<div class="col-sm-3">
							<center>
								<img src="images/iconos/promotions.png" class="img-responsive"
									width="160" />
							</center>
							<div class="br-4"></div>
							<span class="text-whatis">Promociones<br />Especiales
							</span>
							<div class="br-6 hidden-md hidden-lg"></div>
						</div>
						<div class="col-sm-3">
							<center>
								<img src="images/iconos/buy-points.png" class="img-responsive"
									width="160" />
							</center>
							<div class="br-4"></div>
							<span class="text-whatis">Venta de<br />Tarjetas
							</span>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!--Registro-->


		<script type="text/javascript">

    var _0x6119 = ["\x76\x61\x6C", "\x6C\x65\x6E\x67\x74\x68", "\x6D\x61\x74\x63\x68", "\x48\x6F\x6D\x65\x2E\x61\x73\x70\x78\x2F\x47\x65\x74\x43\x61\x72\x64\x44\x61\x74\x61", "\x73\x74\x72\x69\x6E\x67\x69\x66\x79", "\x61\x70\x70\x6C\x69\x63\x61\x74\x69\x6F\x6E\x2F\x6A\x73\x6F\x6E\x3B\x20\x63\x68\x61\x72\x73\x65\x74\x3D\x75\x74\x66\x2D\x38", "\x6A\x73\x6F\x6E", "\x70\x6F\x73\x74", "\x64", "\x6E\x75\x6C\x6C", "\x2C", "\x73\x70\x6C\x69\x74", "\x61\x6A\x61\x78", "\x6B\x65\x79\x75\x70", "\x31", "", "\x68\x74\x6D\x6C", "\x2E\x65\x72\x72\x6F\x72\x5F\x6C\x6F\x67\x69\x6E", "\x68\x69\x64\x65", "\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64", "\x63\x68\x65\x63\x6B\x65\x64", "\x49\x73\x56\x61\x6C\x69\x64"]; $(function () { $('#Register_TbxCardNumber')[_0x6119[13]](function () { var _0xb8c7x1 = $('#Register_TbxCardNumber')[_0x6119[0]](); if (_0xb8c7x1[_0x6119[1]] == 16 && _0xb8c7x1[_0x6119[2]](/25832332.*/)) { $[_0x6119[12]]({ url: _0x6119[3], data: JSON[_0x6119[4]]({ card: _0xb8c7x1 }), contentType: _0x6119[5], datatype: _0x6119[6], type: _0x6119[7], success: function (_0xb8c7x2) { if (_0xb8c7x2[_0x6119[8]] != _0x6119[9]) { var _0xb8c7x3 = _0xb8c7x2[_0x6119[8]][_0x6119[11]](_0x6119[10]); $('#Register_TbxName')[_0x6119[0]](_0xb8c7x3[0]); $('#Register_TbxLastName')[_0x6119[0]](_0xb8c7x3[1]); $('#Register_TbxPhone')[_0x6119[0]](_0xb8c7x3[2]) } } }) } }); var _0xb8c7x4 = $('#Register_HfClearLoginMsg')[_0x6119[0]](); if (_0xb8c7x4 == _0x6119[14]) { $(_0x6119[17])[_0x6119[16]](_0x6119[15]); $(_0x6119[17])[_0x6119[18]]() } }); function ValidateCheckBoxList(_0xb8c7x6, _0xb8c7x7) { var _0xb8c7x8 = document[_0x6119[19]]('Register_ChkBxAccep'); var _0xb8c7x9 = false; if (_0xb8c7x8[_0x6119[20]]) { _0xb8c7x9 = true }; _0xb8c7x7[_0x6119[21]] = _0xb8c7x9 } function ValidateCheckBoxList2(_0xb8c7x6, _0xb8c7x7) { var _0xb8c7x8 = document[_0x6119[19]]('Register_ChkBxPolices'); var _0xb8c7x9 = false; if (_0xb8c7x8[_0x6119[20]]) { _0xb8c7x9 = true }; _0xb8c7x7[_0x6119[21]] = _0xb8c7x9 }

</script>

		<!-- registro -->
		<div id="Register_Panel1"
			onkeypress="javascript:return WebForm_FireDefaultButton(event, &#39;Register_BtnSave&#39;)">

			<div class="vacio" id="register_session"></div>
			<section class="content-section" id="registro"
				ondragstart="return false;" oncontextmenu="return false;">
				<div class="br-5"></div>
				<!--<center><img src="images/home/line-strong.png" class="img-responsive"></center>-->
<!-- 				<center> -->
<!-- 					<img src="images/home/pleca03.png" class="img-responsive"> -->
<!-- 				</center> -->
				<div class="container">
					<div class="heading-section col-md-12 col-sm-12 text-center">
						<h2 class="text-grey">
							<strong>Registro</strong>
						</h2>
					</div>
					<!-- 					<div class="col-sm-12 col-md-12 col-lg-12"> -->
					<div class="form-horizontal col-sm-14 col-md-14 col-lg-14">
						<!----Numero de tarjeta-->
						<div class="form">
							<div class="form-group col-sm-6">
								<label for="" class="control-label col-md-6 hidden-xs">Número de
									Tarjeta: <span class="req">*</span>
								</label>
								<div class="col-md-6 form-card-center">
									<input name="Register_TbxCardNumber" type="text" maxlength="16"
										id="Register_TbxCardNumber" class="form-control"
										placeholder="N&uacute;mero de tarjeta" /> <span
										id="Register_RequiredFieldValidator1" class="error_required"
										style="display: none;">Debe escribir los 16 números de su
										Tarjeta.</span> <span
										id="Register_RegularExpressionValidator4"
										class="error_required" style="display: none;">La Tarjeta debe
										ser de 16 digitos, sin espacios y sin caracteres</span>
								</div>
							</div>
						</div>
						<!----Nombre-->
						<div class="form">
							<div class="form-group col-sm-6">
								<label for="" class="control-label col-md-4 hidden-xs ">Nombre:<span
									class="req">*</span></label>
								<div class="col-md-6">
									<input name="Register_TbxName" type="text"
										id="Register_TbxName" class="form-control"
										placeholder="Nombre" /> <span
										id="Register_RequiredFieldValidator2" class="error_required"
										style="display: none;">Debe escribir su nombre</span> <span
										id="Register_RegularExpressionValidator2"
										class="error_required" style="display: none;">Asegúrate que
										sean solo letras</span>
								</div>
							</div>
						</div>
						<!---->
						<!----Apellido Paterno-->
						<div class="form">
							<div class="form-group col-sm-6">
								<label for="" class="control-label col-md-6 hidden-xs">Apellido
									Paterno:<span class="req">*</span>
								</label>
								<div class="col-md-6">
									<input name="Register_TbxLastName" type="text"
										id="Register_TbxLastName" class="form-control"
										placeholder="Apellido Paterno" /> <span
										id="Register_RequiredFieldValidator3" class="error_required"
										style="display: none;">Debe escribir su apellido paterno</span>
									<span id="Register_RegularExpressionValidator7"
										class="error_required" style="display: none;">Asegúrate que
										sean solo letras</span>
								</div>
							</div>
						</div>
						<!---->
						<!----Apellido Materno-->
						<div class="form-group col-sm-6">
							<label for="" class="control-label col-md-4 hidden-xs">Apellido
								Materno:</label>
							<div class="col-md-6">
								<input name="Register_TbxFirstName" type="text"
									id="Register_TbxFirstName" class="form-control"
									placeholder="Apellido Materno" /> <span
									id="Register_RegularExpressionValidator8"
									class="error_required" style="display: none;">Asegúrate que
									sean solo letras</span>
							</div>
						</div>
						<!---->

						<!----Genero-->
						<div class="form">
							<div class="form-group col-sm-6">
								<label for="" class="control-label col-md-6">Género:<span
									class="req">*</span></label>
								<div class="col-md-6">
									<table id="Register_RdoBtnLstGender">
										<tr>
											<td><input id="Register_RdoBtnLstGender_F" type="radio"
												name="Register_RdoBtnLstGender" value="Femenino" /><label
												for="Register_RdoBtnLstGender_F">Femenino</label></td>
											<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
											<td><input id="Register_RdoBtnLstGender_M" type="radio"
												name="Register_RdoBtnLstGender" checked value="Masculino" /><label
												for="Register_RdoBtnLstGender_M">Masculino</label></td>
										</tr>
									</table>
									<span id="Register_RequiredFieldValidator11"
										class="error_required" style="display: none;">El género es
										requerido</span>
								</div>
							</div>
						</div>
						<!---->
						<!----Fecha de nacimiento-->
						<div class="form-group col-sm-6">
							<label for="" class="control-label col-md-4 ">Fecha de
								nacimiento:<span class="req">*</span>
							</label>
							<div class="row col-md-6 fechanac">
								<div class="col-xs-3 ">
									<div class=" form-group">
										<select name="Register_ddlDay" id="Register_ddlDay"
											class="form-control">
											<option value="-1">Seleccione</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>

										</select>
									</div>
									<span id="Register_RequiredFieldValidator13"
										class="error_required" style="display: none;">Seleccione su
										día de nacimiento</span>
								</div>
								<div class="col-xs-5">
									<div class="form-group">
										<select name="Register_ddlMonth" id="Register_ddlMonth"
											class="form-control">
											<option value="-1">Seleccione</option>
											<option value="01">Enero</option>
											<option value="02">Febrero</option>
											<option value="03">Marzo</option>
											<option value="04">Abril</option>
											<option value="05">Mayo</option>
											<option value="06">Junio</option>
											<option value="07">Julio</option>
											<option value="08">Agosto</option>
											<option value="09">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option>

										</select>
									</div>
									<span id="Register_RequiredFieldValidator22"
										class="error_required" style="display: none;">Seleccione su
										mes de nacimiento</span>
								</div>
								<div class="col-xs-4">
									<div class=" form-group">
										<select name="Register_ddlAnio" id="Register_ddlAnio"
											class="form-control">
											<option value="-1">Seleccione</option>
											<option value="2005">2005</option>
											<option value="2004">2004</option>
											<option value="2003">2003</option>
											<option value="2002">2002</option>
											<option value="2001">2001</option>
											<option value="2000">2000</option>
											<option value="1999">1999</option>
											<option value="1998">1998</option>
											<option value="1997">1997</option>
											<option value="1996">1996</option>
											<option value="1995">1995</option>
											<option value="1994">1994</option>
											<option value="1993">1993</option>
											<option value="1992">1992</option>
											<option value="1991">1991</option>
											<option value="1990">1990</option>
											<option value="1989">1989</option>
											<option value="1988">1988</option>
											<option value="1987">1987</option>
											<option value="1986">1986</option>
											<option value="1985">1985</option>
											<option value="1984">1984</option>
											<option value="1983">1983</option>
											<option value="1982">1982</option>
											<option value="1981">1981</option>
											<option value="1980">1980</option>
											<option value="1979">1979</option>
											<option value="1978">1978</option>
											<option value="1977">1977</option>
											<option value="1976">1976</option>
											<option value="1975">1975</option>
											<option value="1974">1974</option>
											<option value="1973">1973</option>
											<option value="1972">1972</option>
											<option value="1971">1971</option>
											<option value="1970">1970</option>
											<option value="1969">1969</option>
											<option value="1968">1968</option>
											<option value="1967">1967</option>
											<option value="1966">1966</option>
											<option value="1965">1965</option>
											<option value="1964">1964</option>
											<option value="1963">1963</option>
											<option value="1962">1962</option>
											<option value="1961">1961</option>
											<option value="1960">1960</option>
											<option value="1959">1959</option>
											<option value="1958">1958</option>
											<option value="1957">1957</option>
											<option value="1956">1956</option>
											<option value="1955">1955</option>
											<option value="1954">1954</option>
											<option value="1953">1953</option>
											<option value="1952">1952</option>
											<option value="1951">1951</option>
											<option value="1950">1950</option>
											<option value="1949">1949</option>
											<option value="1948">1948</option>
											<option value="1947">1947</option>
											<option value="1946">1946</option>
											<option value="1945">1945</option>
											<option value="1944">1944</option>
											<option value="1943">1943</option>
											<option value="1942">1942</option>
											<option value="1941">1941</option>
											<option value="1940">1940</option>
											<option value="1939">1939</option>
											<option value="1938">1938</option>
											<option value="1937">1937</option>
											<option value="1936">1936</option>
											<option value="1935">1935</option>
											<option value="1934">1934</option>
											<option value="1933">1933</option>
											<option value="1932">1932</option>
											<option value="1931">1931</option>
											<option value="1930">1930</option>
											<option value="1929">1929</option>
											<option value="1928">1928</option>
											<option value="1927">1927</option>
											<option value="1926">1926</option>
											<option value="1925">1925</option>
											<option value="1924">1924</option>
											<option value="1923">1923</option>
											<option value="1922">1922</option>
											<option value="1921">1921</option>
											<option value="1920">1920</option>
											<option value="1919">1919</option>
											<option value="1918">1918</option>
											<option value="1917">1917</option>

										</select>
									</div>
									<span id="Register_RequiredFieldValidator14"
										class="error_required" style="display: none;">Seleccione su
										año de nacimiento</span>
								</div>
							</div>
						</div>
						<!---->
						<!----E mail-->
						<div class="form">
							<div class="form-group col-sm-6">
								<label for="" class="control-label col-md-6 hidden-xs">Correo
									Electrónico:<span class="req">*</span>
								</label>
								<div class="col-md-6">
									<input name="Register_TbxEmail" type="text"
										id="Register_TbxEmail" class="form-control mail"
										placeholder="Correo electr&oacute;nico" /> <span
										id="Register_RegularExpressionValidator3"
										class="error_required_red" style="display: none;">El formato
										del correo electrónico no es válido</span> <span
										id="Register_RequiredFieldValidator4"
										class="error_required_red" style="display: none;">Debe
										escribir su correo</span>
								</div>
							</div>
						</div>
						<!---->
						<!----Confirmar Correo electr&oacute;nico-->
						<div class="form">
							<div class="form-group col-sm-6">
								<label for="" class="control-label col-md-4 hidden-xs">Confirmar
									Correo Electrónico:<span class="req">*</span>
								</label>
								<div class="col-md-6">
									<input name="Register_TbxConfirmEmail" type="text"
										id="Register_TbxConfirmEmail" class="form-control mail"
										placeholder="Confirme correo electr&oacute;nico" /> <span
										id="Register_RequiredFieldValidator5"
										class="error_required_red" style="display: none;">Debe
										confirmar su correo</span> <span
										id="Register_CompareValidator1" class="error_required_red"
										style="display: none;">El correo electrónico y su confirmación
										deben coincidir</span>
								</div>
							</div>
						</div>
						<!---->
						<!----N&uacute;mero fijo-->
						<div class="form">
							<div class="form-group col-sm-6">
								<label for="" class="control-label col-md-6">Número de Celular:<span
									class="req">*</span>
								</label>
								<div class="col-md-6">


									<input name="Register_TbxPhone" type="text" maxlength="10"
										id="Register_TbxPhone" class="form-control"
										placeholder="N&uacute;mero a 10 d&iacute;gitos" /> <span
										id="Register_RequiredFieldValidator6" class="error_required"
										style="display: none;">El número de celular es requerido</span>
									<span id="Register_RegularExpressionValidator1"
										class="error_required" style="display: none;">El formato del
										número de celular no es válido</span>
									<div class="br-2"></div>
									<div class="formulariopie">El número de celular debe incluir la
										clave de larga distancia.</div>


								</div>
							</div>
						</div>
						<!---->

						<!--c.p.-->
						<div class="form">
							<div class="form-group col-sm-6">
								<label for="" class="control-label col-md-4 hidden-xs">Código
									Postal:<span class="req">*</span>
								</label>
								<div class="input-group-horizontal col-md-6">
									<input name="Register_TbxPostalCode" type="text" maxlength="5"
										id="Register_TbxPostalCode" class="form-control"
										placeholder="C&oacute;digo Postal" /> <span
										id="Register_RequiredFieldValidator8" class="error_required"
										style="display: none;">El código postal es requerido</span> <span
										id="Register_RegularExpressionValidator5"
										class="error_required" style="display: none;">Código Postal
										inválido</span>

									<!--                                     <div class="col-sm-5"> -->
									<!--                                         <input type="submit" name="ctl00$Register$BtnPostalCode" value="Verificar C.P." id="Register_BtnPostalCode" class="btn_verify_cp" /> -->
									<!--                                     </div>        -->

								</div>
							</div>
						</div>
						<div class="br-1"></div>
						<!---Contrasenia-->
						-
						<div class="form">
							<div class="form-group col-sm-6">

								<label for="" class="control-label col-md-6 hidden-xs">Contraseña:<span
									class="req">*</span></label>

								<div class="col-md-6">
									<input name="Register_TbxPassword" type="password"
										maxlength="30" id="Register_TbxPassword" class="form-control"
										placeholder="Contrase&ntilde;a" /> <span
										id="Register_RequiredFieldValidator9" class="error_required"
										style="display: none;">La contraseña es requerida</span> <span
										id="Register_RegularExpressionValidator6"
										class="error_required" style="display: none;">La contraseña
										debe ser de mínimo 6 caracteres</span>
									<div class="br-3"></div>
									<div class="formulariopie">La contraseña debe ser mínimo de 6
										caracteres, puede incluir mayúsculas, minúsculas, números y
										caracteres especiales.</div>
								</div>
							</div>
						</div>
						<!---->
						<!---Confirmar Contrasenia-->
						<div class="form">
							<div class="form-group col-sm-6">
								<label for="" class="control-label col-md-4 hidden-xs">Confirmar
									Contraseña:<span class="req">*</span>
								</label>
								<div class="col-md-6">
									<input name="Register_TbxConfirmPassword" type="password"
										maxlength="30" id="Register_TbxConfirmPassword"
										class="form-control" placeholder="Confirma contrase&ntilde;a" />
									<span id="Register_RequiredFieldValidator10"
										class="error_required" style="display: none;">La confirmación
										de la contraseña es requerida</span> <span
										id="Register_CompareValidator2" class="error_required"
										style="display: none;">La contraseña y su confirmación deben
										coincidir</span>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="br-1"></div>
						<!---->
						<!---info-->
						<!-- 						<div class="form-group col-sm-6"> -->
						<!-- 							<div class="col-md-offset-7 col-sm-12"> -->
						<!-- 								<span class="req formularioreq">*</span>información -->
						<!-- 								requerida -->
						<!-- 							</div> -->
						<!-- 						</div> -->
						<!---->

						<!--ckeckboxs-->
						<div class="form-group col-sm-6">
							<div class="checkbox col-md-offset-6 col-sm-6">
								<span class="checkboxSingleLine"><input id="Register_ChkBxAccep"
									type="checkbox" name="ctl00$Register$ChkBxAccep" /><label
									for="Register_ChkBxAccep">Acepto </label></span><a
									href="#terminos" data-toggle="modal">Términos y Condiciones</a>
								de Sirloin Stockade. <span id="Register_CustomValidator1"
									class="error_required" style="display: none;">Asegúrate de
									Aceptar los Términos y Condiciones</span>
							</div>
						</div>
						<div class="form-group col-sm-6">
							<div class="checkbox col-md-offset-5 col-sm-5">
								<span class="checkboxSingleLine"><input
									id="Register_ChkBxPolices" type="checkbox"
									name="ctl00$Register$ChkBxPolices" /><label
									for="Register_ChkBxPolices">Estoy de acuerdo con el </label></span><a
									href="#privacidad" data-toggle="modal">Aviso de Privacidad</a>
								de Sirloin Stockade. <span id="Register_CustomValidator2"
									class="error_required" style="display: none;">Asegúrate de
									Aceptar el Aviso de Privacidad</span>
							</div>
						</div>

						<div class="form-group text-center">
							<input type="submit" name="Register_BtnSave" value="Registrarme"
								onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;Register_BtnSave&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, true))"
								id="Register_BtnSave" class="boton" />
						</div>

						<input type="hidden" name="ctl00$Register$HfClearLoginMsg"
							id="Register_HfClearLoginMsg" />
					</div>
					<!--form-horizontal-->
				</div>
				<!--container-->
			</section>
			<!--content-section-->
			<div class="vacio"></div>

		</div>
		<!-- /registro -->

		<!--Felicidades :Ligar tarjeta:-->
		<div class="modal face" id="ModalSuccess">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="cont_img_register_2" ondragstart="return false;"
							oncontextmenu="return false;">
							<img src="images/iconos/user.png" />
						</div>
						<div class="cont_user_registered">
							<br />
							<p class="text-center">
								<span class="span_congrats">�Felicidades!</span><br />Se ha
								registrado tu tarjeta exitosamente.
							</p>
							<br /> A partir de este momento tu tarjeta est� activada para
							acumulación y canje de puntos, además puedes acceder a tu cuenta,
							para consultar tu saldo, estado de cuenta, así como actualizar
							tus datos personales, y de acceso.
						</div>
						<input type="submit" data-toggle="modal"
							name="ctl00$Register$BtnSignIn" value="Acceder a mi cuenta"
							id="Register_BtnSignIn" class="btn_signin_register"
							onclick="javascript:aceptaRegistroExitoso();" />
					</div>
				</div>
			</div>
		</div>
		<!---->

		<div class="vacio" id="como_session"></div>
		<section class="content-section" id="como">
			<div class="br-5"></div>
<!-- 			<center> -->
<!-- 				<img src="images/home/pleca03.png" class="img-responsive"> -->
<!-- 			</center> -->
			<div class="container-fluid heading-section text-center"
				ondragstart="return false;" oncontextmenu="return false;">
				<h2 class="text-grey">
					<strong>¿Cómo funciona?</strong>
				</h2>
				<div class="br-4"></div>
				<center>
					<img src="images/home/como-funciona.png" class="howitwork-banner" />
				</center>
			</div>
		</section>
		<!-- /como funciona -->

		<!-- promociones -->
		<div class="vacio" id="promo_session"></div>
		<section class="content-section" id="promociones"
			ondragstart="return false;" oncontextmenu="return false;">
<!-- 			<center> -->
<!-- 				<img src="images/home/pleca03.png" class="img-responsive"> -->
<!-- 			</center> -->
			<div class="container" ondragstart='return false;'
				oncontextmenu='return false;'>
				<div class="heading-section col-md-12 text-center">
					<h2 class="text-grey">
						<strong>Promociones</strong>
					</h2>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="row gallery-item">
								<div id="Layout_2_cont_promotions">
									<?php
									$dir = "images/promociones/";
									$div = "<div class='col-sm-6'>";
									$br = "<div class='br-5'></div>";
									$gal="data-lightbox-gallery='gallery1'";
									$cla="alt='' class='img-responsive hvr-grow-shadow'";
									$imagenes = scandir ( $dir );
									foreach ( $imagenes as $key => $val ) {
										
										// revisamos que sean jpg o png
										$i=0;
										if (substr ( $val, - 3 ) == "png" || substr ( $val, - 3 ) == "jpg") {
// 											echo "$key => $val ";
											echo "$div <a href='".$dir.$val."' $gal> <img src='".$dir.$val."' $cla></a></div>"; 
											$i++;
											if($i%2==0)
												echo $br;
										}
									}
									
									?>
<!-- 									<div class='col-sm-6'> -->
<!-- 										<a href='images/promotions/promo1.jpg' -->
<!-- 											data-lightbox-gallery='gallery1'><img -->
<!-- 											src='images/promotions/promo1.jpg' alt='' -->
<!-- 											class='img-responsive hvr-grow-shadow'></a> -->
<!-- 									</div> -->

<!-- 									<div class='col-sm-6'> -->
<!-- 										<a href='images/promotions/promo2.jpg' -->
<!-- 											data-lightbox-gallery='gallery1'><img -->
<!-- 											src='images/promotions/promo2.jpg' alt='' -->
<!-- 											class='img-responsive hvr-grow-shadow'></a> -->
<!-- 									</div> -->
<!-- 									<div class='br-5'></div> -->
<!-- 									<div class='col-sm-6'> -->
<!-- 										<a href='images/promotions/promo3.jpg' -->
<!-- 											data-lightbox-gallery='gallery1'><img -->
<!-- 											src='images/promotions/promo3.jpg' alt='' -->
<!-- 											class='img-responsive hvr-grow-shadow'></a> -->
<!-- 									</div> -->
<!-- 									<div class='col-sm-6'> -->
<!-- 										<a href='images/promotions/promo4.jpg' -->
<!-- 											data-lightbox-gallery='gallery1'><img -->
<!-- 											src='images/promotions/promo4.jpg' alt='' -->
<!-- 											class='img-responsive hvr-grow-shadow'></a> -->
<!-- 									</div> -->
									<div class='br-5'></div>

									<div class='br-5'></div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /promociones-->

		<div id="Layout_2_cont_modals_promo"></div>
		<div id="Layout_2_cont_scripts_promo">
			<script type='text/javascript'>$(function(){$('#seePromo11').click(function(){window.open('http://www.sirloindf.com/');});});</script>
		</div>

		<!--Contactanos-->
		<div class="vacio"></div>
		<div class="content-section bgfooter" id="contact"
			ondragstart="return false;" oncontextmenu="return false;">
			<div class="br-5"></div>
			<center>
				<img src="images/home/line-strong-white.png" class="img-responsive">
			</center>
			<div class="container">
				<div class="heading-section col-md-12 text-center">
					<h2 class="span-white">Soporte</h2>
				</div>
				<!-- /.heading-section -->
				<!-- /.row -->
				<div class="col-md-7 col-sm-6 cont_text_contact">
					<p class="span-white">En Sirloin Stockade estámos comprometidos a
						servirte, por lo que te pedimos llenes la forma de contacto y
						envíanos tu duda.</p>

					<!-- spacing for mobile viewing -->
					<br> <br>
				</div>
				<!-- /.col-md-7 -->
				<div class="col-md-5 col-sm-6">
					<div class="contact-form">
						<div id="Layout_2_PanelContact"
							onkeypress="javascript:return WebForm_FireDefaultButton(event, &#39;Layout_2_BtnSaveContact&#39;)">

							<input name="ctl00$Layout_2$TbxNameContact" type="text"
								id="Layout_2_TbxNameContact" placeholder="Nombre"
								class="form-control" /> <span
								id="Layout_2_RequiredFieldValidator1"
								class="error_required_contact" style="display: none;">Debe
								escribir su nombre</span> <input
								name="ctl00$Layout_2$TbxEmailContact" type="text"
								id="Layout_2_TbxEmailContact"
								placeholder="Correo electr&oacute;nico" class="form-control" />
							<span id="Layout_2_RequiredFieldValidator2"
								class="error_required_contact" style="display: none;">Debe
								escribir su correo</span> <span
								id="Layout_2_RegularExpressionValidator1"
								class="error_required_contact" style="display: none;">El formato
								de correo electrónico no es válido</span> <input
								name="ctl00$Layout_2$TbxPhoneContact" type="text" maxlength="10"
								id="Layout_2_TbxPhoneContact" placeholder="Tel&eacute;fono"
								class="form-control" /> <span
								id="Layout_2_RegularExpressionValidator2"
								class="error_required_contact" style="display: none;">El
								tel�fono es de 10 digitos y solo números</span>

							<textarea name="ctl00$Layout_2$TbxCommentContact" rows="2"
								cols="20" id="Layout_2_TbxCommentContact" placeholder="Asunto"
								class="form-control textarea">
</textarea>
							<span id="Layout_2_RequiredFieldValidator4"
								class="error_required_comment" style="display: none;">Debe
								escribir su duda o comentario</span> <input type="submit"
								name="ctl00$Layout_2$BtnSaveContact" value="Enviar"
								onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$Layout_2$BtnSaveContact&quot;, &quot;&quot;, true, &quot;ContactValidation&quot;, &quot;&quot;, false, false))"
								id="Layout_2_BtnSaveContact" class="botonmax" />

						</div>

						<input type="hidden" name="ctl00$Layout_2$HfClearLoginMsg"
							id="Layout_2_HfClearLoginMsg" />
					</div>
					<!-- /.contact-form -->
				</div>
				<!-- /.col-md-5 -->
			</div>
			<!-- /.row -->


		</div>


		</div>

		<!-- Mensaje env&iacute;ado con &eacute;xito -->
		<div class="modal face" id="ModalSuccessMail">
			<div class="modal-dialog" ondragstart="return false;"
				oncontextmenu="return false;">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<br />
						<center>
							<img src="images/logo/logo_header_2.png" width="200" alt="">
						</center>
						<br />
						<h2 class="txtpopup text-center">�Mensaje Enviado!</h2>
						<div class="cont_success_linkedcards">
							<p class="cont_text_linkedcards">Se ha enviado exitosamente tu
								mensaje!, a la brevedad responderemos tu comentario, duda o
								sugerencia, o nos pondremos en contacto contigo.</p>
							<br /> <span class="span_text_lcn">Saludos!</span><br /> El
							Equipo de <span class="span_text_lc">Sirloin Stockade.</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!---->

		<div class="br-6 br-footer"></div>

		<!--Content-->

		<div id="ContentPlaceHolder1_PnlContent"></div>


		<!-- Footer -->
		<div class="br-5 bg-grey"></div>
		<div class="bg-grey">
			<div class="container bg-grey" ondragstart="return false;"
				oncontextmenu="return false;">
				<!--<a href="http://www.bluepureloyalty.com/" target="_blank"><img src="images/PoweredByBlue.png" alt="" class="pull-right powered" /></a>-->
			</div>
		</div>

		<div class="container-fluid footermodal">
			<div class="">
				<ul>
					<li><a href="#terminos" data-toggle="modal">Términos y Condiciones</a></li>
					<li>|</li>
					<li><a href="#preguntas" data-toggle="modal">Preguntas Frecuentes</a></li>
					<li>|</li>
					<li><a href="#privacidad" data-toggle="modal">Aviso de Privacidad</a></li>
					<li>|</li>
					<li><a href="mailto:info@sirloindf.com">info@sirloindf.com</a></li>
				</ul>
			</div>
		</div>

		<div class="footerb container-fluid" ondragstart="return false;"
			oncontextmenu="return false;">
			<div class="text-center">
				<center>
					<a href="#" target="_blank"><img
						src="images/icono_blue.png" alt="" />mas-rfidsolutions.com</a>
				</center>
			</div>
			<div class="text-center">
				<a href="#" class="bluemx"
					target="_blank"></a>
			</div>
		</div>

		<!--TeRMINOS Y CONDICIONES-->
		<div class="modal face" id="terminos">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button style="" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h2 class="modal-title page-header text-center">
							<strong>T�RMINOS Y CONDICIONES DE<br />SIRLOIN STOCKADE<br />
								<center>Programa de Puntos VIP</center></strong>
						</h2>
						<br />
						<p class="text-justify">
							<strong>TARJETA DE BENEFICIOS</strong> <br /> Porque nos gusta
							consentir, premiar y distinguir la fidelidad de nuestros Clientes
							más valiosos, creamos un Programa de Puntos a través de una
							tarjeta de fidelidad para recompensar tu preferencia, que tendrá
							grandes beneficios para ti. podrás utilizar y gozar de tu Tarjeta
							de Programa de Puntos VIP y otros beneficios como descuentos,
							promociones, etc., exclusivamente en todas las sucursales del
							Restaurante Sirloin Stockade de la CDMX.
						</p>
						<p class="text-justify">
							<strong>�C�MO OBTENERLA</strong> <br /> podrás obtener tu tarjeta
							de Programa de Puntos VIP en cualquier Resturante Sirloin
							Stockade de la CDMX, con un costo de $50.00 pesos (cincuenta
							pesos 00/100 M.N).<br /> Llena una solicitud de inscripción para
							la adquisición de la Tarjeta, acepta el aviso de privacidad y uso
							de datos personales.<br /> Con el Ticket de compra de tu Tarjeta
							y la solicitud de inscripción completamente llenada, se realizar�
							la activación de tu tarjeta.<br /> Los puntos acumulados en tu
							Tarjeta tienen una VIGENCIA hasta el 28 de febrero de cada a�o.
							Si no utilizas los puntos antes de la fecha anteriormente
							indicada se perder�n. Los puntos serán personales e
							intransferibles, no se pueden regalar, prestar o vender.
						</p>
						<p class="text-justify">
							<strong>BENEFICIOS Y LINEAMIENTOS</strong> <br /> La Tarjeta de
							Programa de Puntos VIP, así como sus beneficios, lineamientos,
							descuentos y promociones anunciados, serán válidos y aplicados
							exclusivamente en todas las sucursales del Restaurante Sirloin
							Stockade de la CDMX.<br /> En cada visita que realices obtendrás
							un 10% (diez por ciento) del monto total de tu compra en puntos,
							cada punto acumulado equivale a $1.00 peso (un peso 00/100 M.N),
							que podrás utilizar como dinero en tus siguientes visitas. Por lo
							que, de manera automática se acumular�n los puntos
							correspondientes a los consumos realizados.<br /> Los puntos
							deberán acumularse en el momento de la compra. Es indispensable
							presentar tu Tarjeta de Programa de Puntos VIP Sirloin Stockade
							al inicio de la transacción de compra para poder abonar tus
							puntos, de lo contrario no será posible acumular tus puntos y no
							se podrá hacer posterior a la compra. Los puntos obtenidos serán
							abonados a tu tarjeta dentro de las 24 hrs., siguientes a la
							transacción o compra realizada, por lo que podrás hacer uso de
							esos puntos pasando dicho término.<br /> Nos reservamos el
							derecho discrecional de terminar con el uso o aplicación de
							beneficios de las Tarjetas en cualquier momento, debiendo
							notificar previamente dicha situación a nuestros Clientes. Con
							posterioridad a la fecha de terminación que se hayan establecido,
							los puntos y cualesquier otro aspecto relacionado directa o
							indirectamente con las Tarjetas concluir� definitivamente en la
							fecha que así se se�ale y por lo tanto dejarán de ser válidos,
							precisamente a partir de dicha fecha de terminación. <br /> Bajo
							ninguna circunstancia se realizar�n transferencias de saldos
							entre tarjetas, ni será canjeada por dinero en efectivo.<br /> El
							usuario acepta que la tarjeta se rige por las políticas y
							lineamientos establecidos por la empresa. Cualquier término y/o
							condición establecida con relación a las promociones,
							lineamientos y beneficios, es en adición a las políticas y
							lineamientos internos vigentes de la empresa, las cuales
							prevalecer�n en todo momento sobre el programa.<br /> La cuota de
							inscripción o pago de la tarjeta no es reembolsable, ni serán
							abonados como puntos. El pago del consumo que hayan sido
							realizadas con los puntos acumulados o adquiridos, no generan
							puntos.<br /> No nos hacemos responsables en caso de robo o
							extrav�o de las tarjetas proporcionadas, ni por el mal uso que se
							haga de ella, toda vez que es responsabilidad del Cliente que la
							recibi�. así mismo, por el mal uso de la Tarjeta adquirida, el
							Cliente responder� de los daños y perjuicios causados a la
							empresa o a terceros. Los puntos acumulados en caso de Robo o
							Extrav�o de la Tarjeta se perder�n automáticamente por lo que, no
							podrán ser recuperados o transferidos a otra tarjeta.
						</p>
						<p class="text-justify">
							<strong>CONFIDENCIALIDAD, USO DE DATOS PERSONALES Y AVISO DE
								PRIVASIDAD</strong> <br /> Preservar tu privacidad y la
							seguridad de tu información personal es importante para nosotros
							por lo cual estamos comprometidos con la protección de los Datos
							Personales de nuestros clientes. Cuidamos la privacidad de tus
							Datos para brindarte la confianza de que tus Datos Personales
							están protegidos. �nicamente las personas autorizadas tendrán
							acceso a tus Datos Personales, con el propósito de brindarte un
							mejor servicio por parte de nosotros y así evitar una divulgación
							indebida.<br /> Por favor, antes de proporcionarnos tus Datos
							Personales t�mate un momento para leer el siguiente Aviso de
							Privacidad. Todos tus Datos Personales serán tratados con base en
							los principios de licitud, consentimiento, información,
							responsabilidad y finalidad de conformidad con la Ley Federal de
							Protección de Datos Personales en Posesión de los Particulares,
							su Reglamento y sus Lineamientos, tus Datos son recabados con la
							finalidad de brindarte productos o servicios y comunicarte
							promociones.<br /> EXPERTOS COMENSALES DE MÉXICO, S.A. DE C.V.
							(�Sirloin Stockade� D.F.), con domicilio social en: Calzada de
							los Leones 171 102, Col. Las �guilas, Del. �lvaro Obreg�n,
							México, Distrito Federal, C.P. 01710. Tel�fono: (01) 56519677, te
							comunican:<br /> EXPERTOS COMENSALES DE MEXICO, S.A. DE C.V.
							solicita información personal de identidad de los usuarios de
							nuestros establecimientos, �nicamente de manera voluntaria para
							poder ver los servicios que ofrece el sitio. Los datos personales
							que requerimos son los siguientes:<br /> i) Nombre; ii) E-Mail;
							iii) Tel�fono; iv) C.P; y vi) Fecha de Nacimiento.<br /> Los
							datos personales recabados, tienen la finalidad de dar
							seguimiento al servicio, promociones, lanzamiento de nuevo
							productos, control del programa de puntos, evaluar nuestro
							servicio.<br /> Para las finalidades mencionadas en el p�rrafo
							anterior, usted tiene un plazo de 5 días hábiles para manifestar
							su negativa al tratamiento de su información personal, enviando
							la misma al correo electrónico avisodeprivacidad@sirloindf.com o
							comunic�ndose al 56519677.<br /> NOTA: La información personal
							que requerimos no es considerada como sensible de acuerdo con la
							Ley Federal de Protección d los procedimientos que hemos
							implementado. Para conocer dichos procedimientos, los requisitos,
							plazos, se pueden poner en contacto con nosotros a través del
							correo electrónico avisodeprivacidad@sirloindf.com o al tel�fono
							indicado.<br /> Si usted desea limitar el uso y divulgación de
							sus datos personales, concretamente, respecto al uso de su
							información personal para fines publicitarios o mercadot�cnicos,
							podrá solicitarlo a través de nuestro departamento
							administrativo.<br /> EXPERTOS COMENSALES DE MEXICO, S.A DE C.V.
							podrá revelar información cuando por mandato de ley y/o de
							autoridad competente le fuere requerido o por considerar de buena
							fe que dicha revelación es necesaria para:<br /> I) Cumplir con
							procesos legales;<br /> II) Cumplir con el Convenio del Usuario;<br />
							III) Responder reclamaciones que involucren cualquier Contenido
							que menoscabe derechos de terceros o;<br /> IV) Proteger los
							derechos, la propiedad, o la seguridad de Cortes y Bufetes de
							México, sus Usuarios y el público en general.<br /> EXPERTOS
							COMENSALES DE MEXICO, S.A. DE C.V., se abstendrá de vender,
							arrendar o alquilar tus Datos Personales a un tercero; pero por
							razones de operación y servicio podrán ser transferidos
							�nicamente tus datos proporcionados con: Empresas encargadas de
							la emisi�n de tarjetas de programas de lealtad y artículos
							promocionales. Empresas de Comunicación, a efecto de mantenerte
							informado de nuestros eventos y promociones o de nuestros
							patrocinadores y socios comerciales, así como, promocionales
							(propagandas, radio, T.V. etc.), empresas de investigaciones de
							mercado, para hacer evaluaciones del servicio.<br /> Los datos
							proporcionados a EXPERTOS COMENSALES DE MEXICO, S.A. DE C.V.,
							serán resguardados y administrados en términos de lo dispuesto en
							la Ley y en tal sentido, nos comprometemos a salvaguardar tal
							información bajo los principios de lealtad y responsabilidad.
							Además, la información obtenida se encuentra protegida por medio
							de procedimientos f�sicos, tecnol�gicos y administrativos
							apegados a normas que salvaguardan los datos en términos de lo
							dispuesto en la Ley.<br /> Para poder ejercer los derechos de
							Acceso, Rectificación, Cancelación y Oposición o revocar su
							consentimiento (ARCO), el titular, por s� mismo o mediante un
							representante legal debidamente acreditado, podrá hacerlo valer
							mediante el procedimiento indicado en nuestro sitio
							www.sirloindf.com aviso de privacidad.<br /> Si usted no est� de
							acuerdo con la Política de Privacidad aqué enunciada, por favor
							no firme de conformidad, ni utilice los servicios ofrecidos por
							el mismo.<br /> La firma el presente documento y/o la utilización
							de nuestro producto, indica la aceptación de nuestra política de
							Privacidad y Uso de Datos Personales.<br /> Tambi�n podrás
							consultar los términos y condiciones del Programa de Puntos y
							nuestro Aviso de Privacidad en nuestra p�gina de internet
							www.sirloindf.com.
						</p>
						<br />
						<center>
							<button type="button" class="btn-close" data-dismiss='modal'>Cerrar</button>
						</center>
					</div>
				</div>
			</div>
		</div>
		<!-- /T&eacute;rminos Y CONDICIONES-->

		<!-- PREGUNTAS FRECUENTES -->
		<div class="modal face" id="preguntas">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button style="" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h2 class="modal-title page-header text-center">
							<strong>PREGUNTAS FRECUENTES</strong>
						</h2>
						<br />
						<p class="text-justify">
							<strong>1. ¿Qué es el Programa VIP?</strong> <br /> Lorem ipsum
							dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac
							ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa
							sagittis, quis ornare risus blandit. In odio eros, maximus quis
							cursus non, pellentesque non nulla. Aenean non libero vitae ex
							placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget
							pharetra. Fusce in ex orci. Nullam ac tristique odio.<br /> Lorem
							ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante
							ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa
							sagittis, quis ornare risus blandit. In odio eros, maximus quis
							cursus non, pellentesque non nulla. Aenean non libero vitae ex
							placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget
							pharetra. Fusce in ex orci. Nullam ac tristique odio.
						</p>
						<p class="text-justify">
							<strong>2. �En dónde puedo adquirir la Tarjeta VIP?</strong> <br />
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
							rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis
							turpis vel massa sagittis, quis ornare risus blandit. In odio
							eros, maximus quis cursus non, pellentesque non nulla. Aenean non
							libero vitae ex placerat rutrum ac vel ligula. Donec bibendum
							lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique
							odio.<br /> Lorem ipsum dolor sit amet, consectetur adipiscing
							elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam
							facilisis turpis vel massa sagittis, quis ornare risus blandit.
							In odio eros, maximus quis cursus non, pellentesque non nulla.
							Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec
							bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac
							tristique odio.
						</p>
						<p class="text-justify">
							<strong>3. �En dónde puedo adquirir la Tarjeta VIP?</strong> <br />
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
							rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis
							turpis vel massa sagittis, quis ornare risus blandit. In odio
							eros, maximus quis cursus non, pellentesque non nulla. Aenean non
							libero vitae ex placerat rutrum ac vel ligula. Donec bibendum
							lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique
							odio.
						</p>
						<p class="text-justify">
							<strong>4. ¿Cómo puedo acumular Puntos en mi cuenta?</strong> <br />
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
							rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis
							turpis vel massa sagittis, quis ornare risus blandit. In odio
							eros, maximus quis cursus non, pellentesque non nulla. Aenean non
							libero vitae ex placerat rutrum ac vel ligula. Donec bibendum
							lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique
							odio.
						</p>
						<p class="text-justify">
							<strong>5. Para acumular Puntos �es necesario presentar mi
								tarjeta al momento de realizar la compra?</strong> <br /> Lorem
							ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante
							ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa
							sagittis, quis ornare risus blandit. In odio eros, maximus quis
							cursus non, pellentesque non nulla. Aenean non libero vitae ex
							placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget
							pharetra. Fusce in ex orci. Nullam ac tristique odio.
						</p>
						<p class="text-justify">
							<strong>6. ¿Cómo obtengo el Bono de Bienvenida?</strong> <br />
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
							rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis
							turpis vel massa sagittis, quis ornare risus blandit. In odio
							eros, maximus quis cursus non, pellentesque non nulla. Aenean non
							libero vitae ex placerat rutrum ac vel ligula. Donec bibendum
							lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique
							odio.<br /> Lorem ipsum dolor sit amet, consectetur adipiscing
							elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam
							facilisis turpis vel massa sagittis, quis ornare risus blandit.
							In odio eros, maximus quis cursus non, pellentesque non nulla.
							Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec
							bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac
							tristique odio.
						</p>
						<p class="text-justify">
							<strong>7. �Para qué utilizo mis Puntos?</strong> <br /> Lorem
							ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante
							ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa
							sagittis, quis ornare risus blandit. In odio eros, maximus quis
							cursus non, pellentesque non nulla. Aenean non libero vitae ex
							placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget
							pharetra. Fusce in ex orci. Nullam ac tristique odio. <br />
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
							rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis
							turpis vel massa sagittis, quis ornare risus blandit. In odio
							eros, maximus quis cursus non, pellentesque non nulla. Aenean non
							libero vitae ex placerat rutrum ac vel ligula. Donec bibendum
							lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique
							odio.
						</p>
						<p class="text-justify">
							<strong>8. �Cu�nto valen mis Puntos?</strong> <br /> Lorem ipsum
							dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac
							ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa
							sagittis, quis ornare risus blandit. In odio eros, maximus quis
							cursus non, pellentesque non nulla. Aenean non libero vitae ex
							placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget
							pharetra. Fusce in ex orci. Nullam ac tristique odio.<br /> <b>Por
								ejemplo</b>: 10 Puntos = $10 (diez) pesos.
						</p>
						<p class="text-justify">
							<strong>9. �Puedo cambiar mis Puntos por dinero?</strong> <br />
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
							rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis
							turpis vel massa sagittis, quis ornare risus blandit. In odio
							eros, maximus quis cursus non, pellentesque non nulla. Aenean non
							libero vitae ex placerat rutrum ac vel ligula. Donec bibendum
							lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique
							odio.
						</p>
						<p class="text-justify">
							<strong>10. ¿Qué vigencia tiene mi Tarjeta VIP?</strong> <br />
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
							rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis
							turpis vel massa sagittis, quis ornare risus blandit. In odio
							eros, maximus quis cursus non, pellentesque non nulla. Aenean non
							libero vitae ex placerat rutrum ac vel ligula. Donec bibendum
							lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique
							odio.
						</p>
						<p class="text-justify">
							<strong>11. ¿Qué debo hacer en caso de Robo o Extrav�o de mi
								tarjeta?</strong> <br /> Lorem ipsum dolor sit amet, consectetur
							adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar.
							Aliquam facilisis turpis vel massa sagittis, quis ornare risus
							blandit. In odio eros, maximus quis cursus non, pellentesque non
							nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula.
							Donec bibendum lacinia dui eget pharetra. Fusce in ex orci.
							Nullam ac tristique odio.<br /> Lorem ipsum dolor sit amet,
							consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum
							pulvinar. Aliquam facilisis turpis vel massa sagittis, quis
							ornare risus blandit. In odio eros, maximus quis cursus non,
							pellentesque non nulla. Aenean non libero vitae ex placerat
							rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra.
							Fusce in ex orci. Nullam ac tristique odio.
						</p>
						<p class="text-justify">
							<strong>12. ¿Cómo puedo solicitar una Reposición de mi tarjeta?</strong>
							<br /> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis
							turpis vel massa sagittis, quis ornare risus blandit. In odio
							eros, maximus quis cursus non, pellentesque non nulla. Aenean non
							libero vitae ex placerat rutrum ac vel ligula. Donec bibendum
							lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique
							odio.
						</p>
						<p class="text-justify">
							<strong>13. �Los Puntos tienen vigencia?</strong> <br /> La
							vigencia de los Puntos es de 12 meses a partir del mes de
							acumulación.
						</p>
						<br />
						<center>
							<button type="button" class="btn-close" data-dismiss='modal'>Cerrar</button>
						</center>
					</div>
				</div>
			</div>
		</div>
		<!-- /PREGUNTAS FRECUENTES -->

		<!-- AVISO DE PRIVACIDAD -->
		<div class="modal face" id="privacidad">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">&times;</button>
						<h1 class="modal-title page-header text-center">
							<strong>AVISO DE PRIVACIDAD</strong>
						</h1>
						<br />
						<p class="text-justify">Preservar tu privacidad y la seguridad de
							tu información personal es importante para nosotros por lo cual
							estamos comprometidos con la protección de los Datos Personales
							de nuestros clientes. Cuidamos la privacidad de tus Datos para
							brindarte la confianza de que tus Datos Personales están
							protegidos. �nicamente las personas autorizadas tendrán acceso a
							tus Datos Personales, con el propósito de brindarte un mejor
							servicio por parte de nosotros y así evitar una divulgación
							indebida. Por favor, antes de proporcionarnos tus Datos
							Personales t�mate un momento para leer el siguiente Aviso de
							Privacidad. Todos tus Datos Personales serán tratados con base en
							los principios de licitud, consentimiento, información,
							responsabilidad y finalidad de conformidad con la Ley Federal de
							Protección de Datos Personales en Posesión de los Particulares,
							su Reglamento y sus Lineamientos, tus Datos son recabados con la
							finalidad de brindarte productos o servicios y comunicarte
							promociones. Al proporcionarnos tus Datos personales daremos por
							entendido que estás de acuerdo con los términos de este Aviso de
							Privacidad, las finalidades del tratamiento de tus Datos, así
							como los medios y procedimiento que ponemos a tu disposición para
							ejercer tus derechos de acceso y rectificación. CORTES Y BUFETES
							DE MEXICO S.A. DE C.V. Con domicilio en AV. CANOA 521 DESP. 202,
							COLONIA TIZAPAN SAN ANGEL, MEXICO D.F. CP 01090 es responsable de
							recabar sus datos personales, del uso que se le dá a los mismos y
							de su protección. Por lo anterior, CORTES Y BUFETES DE MÉXICO
							S.A. DE C.V. ha establecido los siguientes lineamientos para
							proteger dicha información en la medida de lo posible, los cuales
							pueden cambiar en cualquier momento, por lo que sugerimos
							consultarlos peri�dicamente. CORTES Y BUFETES DE MEXICO, S.A. DE
							C.V. solicita información personal de identidad de los usuarios
							de nuestros establecimientos, �nicamente de manera voluntaria
							para poder ver los servicios que ofrece el sitio en los
							siguientes formularios Los datos personales que requerimos son
							los siguientes: Formulario de facturación � RFC � Calle � Colonia
							� Número exterior/interior � Ciudad � Estado � C.P � Correo de
							env�o de factura (casilla de mismo correo de registro) Formulario
							de env�o � Casilla en donde se pueda elegir la misma dirección de
							facturación, para que ya no vuelva a llenar la información (en
							caso de que no sea la misma dirección debe tener los siguientes
							campos para ser llenados) � Calle � Colonia � Número
							exterior/interior � Ciudad � Estado C.P Formulario para
							reservaciones v�a telef�nica o en l�nea � Sucursal a la que desea
							acudir � Nombre y Apellido: � Tel�fono: � Fecha � Empresa �
							Correo electrónico: � No. De personas � Tipo de comida Formulario
							para Bolsa de Trabajo � Nombre y Apellido: � Correo electrónico �
							Edad � Dirección � Tel�fono: � Celular � Puesto Solicitado

							Formulario para Promociones � Nombre y Apellido � Correo
							electrónico: La información capturada es revisada internamente y
							se utiliza para mejorar en el servicio y env�o de promociones a
							nuestros clientes, para notificar a nuestros usuarios acerca de
							actualizaciones y para responder a preguntas hechas por ellos
							mismos. Los datos personales recabados tienen tambi�n como
							finalidad: a) Dar seguimiento al servicio que se les dio en
							nuestras instalaciones así como comentarios o sugerencias. b)
							Darle información que le permita realizar alguna reservación
							posterior o servicios adicionales que tenemos. c) Envío a través
							de correo electrónico de su factura electrónica. d) Evaluar la
							calidad en el servicio e) Env-o de promociones y aviso de
							lanzamiento de nuevos productos o nuevas sucursales. NOTA: Las
							finalidades mencionadas en los incisos a) b) c) d) y e) tienen
							como objetivo brindarle un mejor servicio y son consideradas
							necesarias para la prestación del mismo. Para las finalidades
							mencionadas en el párrafo anterior, usted tiene un plazo de 5
							días hábiles para manifestar su negativa al tratamiento de su
							información personal, enviando la misma al correo electrónico
							avisodeprivacidad@sirloindf.com o comunicándose al 5616-1645.

							NOTA: La información personal que requerimos no es considerada
							como sensible de acuerdo con la Ley Federal de Protección de
							Datos Personales en Posesión de Particulares. Le informamos que
							no transferimos sus datos personales dentro o fuera del país con
							personas distintas a las encargadas de dicha información.
							Finalidades de dichas transferencias, en términos En caso de que
							nos veamos obligados o necesitemos transferir su información
							personal a terceros nacionales o extranjeros, será informado
							previamente de esta situación a efecto de solicitarle su
							autorización e informarle sobre los destinatarios o terceros
							receptores y finalidades de dichas transferencias, en términos de
							lo previsto en los artículos 36 y 37 de la Ley Federal de
							Protección de Datos Personales en Posesión de los Particulares y
							68 de su reglamento. así mismo nos comprometemos a que estos
							terceros tendrán conocimiento del alcance y contenido del aviso
							de privacidad, haciendo especial énfasis, en las finalidades a
							las que usted sujeta el uso y aprovechamiento de su información
							personal. Usted tiene derecho de acceder, rectificar y cancelar
							sus datos personales, así como de oponerse al tratamiento de los
							mismos o revocar el consentimiento que para tal fin nos haya
							otorgado, a través de los procedimientos que hemos implementado.
							Para conocer dichos procedimientos, los requisitos, plazos, se
							pueden poner en contacto con nosotros a través del correo
							electrónico avisodeprivacidad@sirloindf.com o al DOMICILIO: AV.
							CANOA 521 DESP. 202, COLONIA TIZAPAN SAN ANGEL, MEXICO D.F. CP
							01090, tel. 5616-1645. Si usted desea limitar el uso y
							divulgación de sus datos personales, concretamente, respecto al
							uso de su información personal para fines publicitarios o
							mercadot�cnicos, podrá solicitarlo a través de nuestro
							departamento administrativo. CORTES Y BUFETES DE MEXICO, S.A DE
							C.V. podrá revelar información cuando por mandato de ley y/o de
							autoridad competente le fuere requerido o por considerar de buena
							fe que dicha revelación es necesaria para: I) Cumplir con
							procesos legales; II) Cumplir con el Convenio del Usuario; III)
							Responder reclamaciones que involucren cualquier Contenido que
							menoscabe derechos de terceros o; IV) Proteger los derechos, la
							propiedad, o la seguridad de Cortes y Bufetes de México, sus
							Usuarios y el público en general. ACEPTAción DE LA POLÍTICA DE
							PRIVACIDAD Si usted no est� de acuerdo con la Política de
							Privacidad aqué enunciada, por favor no utilice este sitio ni los
							servicios ofrecidos por el mismo. El uso de este sitio web por su
							parte, indica la aceptación de nuestra política de Privacidad.

							LOS DERECHOS ARCO Y REVOCAR EL CONSENTIMIENTO Para poder ejercer
							los derechos de Acceso, Rectificación, Cancelación y Oposición o
							revocar su consentimiento, el titular, por si mismo o mediante un
							representante legal debidamente acreditado, deberá presentar
							formalmente su solicitud ante el Departamento Administrativo de
							CORTES Y BUFETES DE MEXICO, S.A DE C.V. La solicitud para ejercer
							los Derechos ARCO  revocar el consentimiento debe ser en formato
							libre y debe venir acompañada de la siguiente documentación: 1.
							Identificación oficial vigente del Titular 2. En los casos en que
							el ejercicio de los Derechos ARCO se realice a través del
							representante legal del Titular, además de la acreditación de la
							identidad de ambos, se deberá entregar el poder notarial
							correspondiente o carta poder firmada ante dos testigos o
							declaración en comparecencia del Titular. 3. Cuando se quiera
							ejercer el derecho de rectificación, se tendrá que entregar la
							documentación que acredite el cambio solicitado de acuerdo a los
							datos personales a rectificar. La respuesta a dicha solicitud,
							así como el acceso a los datos personales que en su caso se
							soliciten, será por escrito y se entregará por el Responsable de
							la Administración y Protección de Datos Personales de los
							Particulares de CORTES Y BUFETES DE MEXICO S.A. DE C.V. en las
							instalaciones ubicadas en AV. CANOA 521 DESP. 202, COLONIA
							TIZAPAN SAN ANGEL, MEXICO D.F. CP 01090 en un plazo de 20 días
							hábiles contados a partir de la fecha en que fue recibida la
							solicitud, previa acreditación de la identidad del solicitante, o
							en su caso, de la personalidad de su representante. El
							Responsable podrá ampliar éste plazo hasta por 20 días hábiles
							más, cuando el caso lo amerite, con previa notificación de esto
							al titular. PROCEDIMIENTO DE AVISO DE ACTUALIZACIONES A NUESTRO
							AVISO DE PRIVACIDAD Cualquier modificación o actualización de
							nuestro aviso de privacidad o medios para ejercer los derechos
							ARCO serán publicadas Fecha de actualización 10/mayo/2013.</p>
						<br />
						<center>
							<button type="button" class="btn-close" data-dismiss='modal'>Cerrar</button>
						</center>
					</div>
				</div>
			</div>
		</div>
		<!-- /AVISO DE PRIVACIDAD -->


		<script type="text/javascript">
//<![CDATA[
var Page_Validators =  new Array(document.getElementById("Login_Login_UserNameRequired"), document.getElementById("Login_Login_RegularExpressionValidator1"), document.getElementById("Login_Login_PasswordRequired"), document.getElementById("Login_RequiredFieldValidator1"), document.getElementById("Login_RegularExpressionValidator1"), document.getElementById("Register_RequiredFieldValidator1"), document.getElementById("Register_RegularExpressionValidator4"), document.getElementById("Register_RequiredFieldValidator2"), document.getElementById("Register_RegularExpressionValidator2"), document.getElementById("Register_RequiredFieldValidator3"), document.getElementById("Register_RegularExpressionValidator7"), document.getElementById("Register_RegularExpressionValidator8"), document.getElementById("Register_RequiredFieldValidator11"), document.getElementById("Register_RequiredFieldValidator13"), document.getElementById("Register_RequiredFieldValidator22"), document.getElementById("Register_RequiredFieldValidator14"), document.getElementById("Register_RegularExpressionValidator3"), document.getElementById("Register_RequiredFieldValidator4"), document.getElementById("Register_RequiredFieldValidator5"), document.getElementById("Register_CompareValidator1"), document.getElementById("Register_RequiredFieldValidator6"), document.getElementById("Register_RegularExpressionValidator1"), document.getElementById("Register_RequiredFieldValidator8"), document.getElementById("Register_RegularExpressionValidator5"), document.getElementById("Register_RequiredFieldValidator9"), document.getElementById("Register_RegularExpressionValidator6"), document.getElementById("Register_RequiredFieldValidator10"), document.getElementById("Register_CompareValidator2"), document.getElementById("Register_CustomValidator1"), document.getElementById("Register_CustomValidator2"), document.getElementById("Layout_2_RequiredFieldValidator1"), document.getElementById("Layout_2_RequiredFieldValidator2"), document.getElementById("Layout_2_RegularExpressionValidator1"), document.getElementById("Layout_2_RegularExpressionValidator2"), document.getElementById("Layout_2_RequiredFieldValidator4"));
//]]>
</script>

		<script type="text/javascript">
//<![CDATA[
var Login_Login_UserNameRequired = document.all ? document.all["Login_Login_UserNameRequired"] : document.getElementById("Login_Login_UserNameRequired");
Login_Login_UserNameRequired.controltovalidate = "Login_Login_UserName";
Login_Login_UserNameRequired.errormessage = "El correo electronico es requerido.";
Login_Login_UserNameRequired.display = "Dynamic";
Login_Login_UserNameRequired.validationGroup = "ctl00$Login1";
Login_Login_UserNameRequired.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Login_Login_UserNameRequired.initialvalue = "";
var Login_Login_RegularExpressionValidator1 = document.all ? document.all["Login_Login_RegularExpressionValidator1"] : document.getElementById("Login_Login_RegularExpressionValidator1");
Login_Login_RegularExpressionValidator1.controltovalidate = "Login_Login_UserName";
Login_Login_RegularExpressionValidator1.errormessage = "Formato de correo electronico no valido";
Login_Login_RegularExpressionValidator1.display = "Dynamic";
Login_Login_RegularExpressionValidator1.validationGroup = "ctl00$Login1";
Login_Login_RegularExpressionValidator1.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Login_Login_RegularExpressionValidator1.validationexpression = "\\w+([-+.\']\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*";
var Login_Login_PasswordRequired = document.all ? document.all["Login_Login_PasswordRequired"] : document.getElementById("Login_Login_PasswordRequired");
Login_Login_PasswordRequired.controltovalidate = "Login_Login_Password";
Login_Login_PasswordRequired.errormessage = "La contrase&ntilde;a es obligatoria.";
Login_Login_PasswordRequired.display = "Dynamic";
Login_Login_PasswordRequired.validationGroup = "ctl00$Login1";
Login_Login_PasswordRequired.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Login_Login_PasswordRequired.initialvalue = "";
var Login_RequiredFieldValidator1 = document.all ? document.all["Login_RequiredFieldValidator1"] : document.getElementById("Login_RequiredFieldValidator1");
Login_RequiredFieldValidator1.controltovalidate = "Login_TbxEmail";
Login_RequiredFieldValidator1.errormessage = "Ingresa tu correo electr&oacute;nico";
Login_RequiredFieldValidator1.display = "Dynamic";
Login_RequiredFieldValidator1.validationGroup = "RecoverPass";
Login_RequiredFieldValidator1.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Login_RequiredFieldValidator1.initialvalue = "";
var Login_RegularExpressionValidator1 = document.all ? document.all["Login_RegularExpressionValidator1"] : document.getElementById("Login_RegularExpressionValidator1");
Login_RegularExpressionValidator1.controltovalidate = "Login_TbxEmail";
Login_RegularExpressionValidator1.errormessage = "El formato del correo electr&oacute;nico no es v&aacute;lido";
Login_RegularExpressionValidator1.display = "Dynamic";
Login_RegularExpressionValidator1.validationGroup = "RecoverPass";
Login_RegularExpressionValidator1.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Login_RegularExpressionValidator1.validationexpression = "\\w+([-+.\']\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*";
var Register_RequiredFieldValidator1 = document.all ? document.all["Register_RequiredFieldValidator1"] : document.getElementById("Register_RequiredFieldValidator1");
Register_RequiredFieldValidator1.controltovalidate = "Register_TbxCardNumber";
Register_RequiredFieldValidator1.errormessage = "Debe escribir los 16 n&uacute;meros de su Tarjeta.";
Register_RequiredFieldValidator1.display = "Dynamic";
Register_RequiredFieldValidator1.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator1.initialvalue = "";
var Register_RegularExpressionValidator4 = document.all ? document.all["Register_RegularExpressionValidator4"] : document.getElementById("Register_RegularExpressionValidator4");
Register_RegularExpressionValidator4.controltovalidate = "Register_TbxCardNumber";
Register_RegularExpressionValidator4.errormessage = "La Tarjeta debe ser de 16 d&iacute;gitos, sin espacios y sin caracteres";
Register_RegularExpressionValidator4.display = "Dynamic";
Register_RegularExpressionValidator4.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Register_RegularExpressionValidator4.validationexpression = "^[\\d]{16}$";
var Register_RequiredFieldValidator2 = document.all ? document.all["Register_RequiredFieldValidator2"] : document.getElementById("Register_RequiredFieldValidator2");
Register_RequiredFieldValidator2.controltovalidate = "Register_TbxName";
Register_RequiredFieldValidator2.errormessage = "Debe escribir su nombre";
Register_RequiredFieldValidator2.display = "Dynamic";
Register_RequiredFieldValidator2.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator2.initialvalue = "";
var Register_RegularExpressionValidator2 = document.all ? document.all["Register_RegularExpressionValidator2"] : document.getElementById("Register_RegularExpressionValidator2");
Register_RegularExpressionValidator2.controltovalidate = "Register_TbxName";
Register_RegularExpressionValidator2.errormessage = "Asegurate que sean s&oacute;lo letras";
Register_RegularExpressionValidator2.display = "Dynamic";
Register_RegularExpressionValidator2.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Register_RegularExpressionValidator2.validationexpression = "[a-zA-Z]*$";
var Register_RequiredFieldValidator3 = document.all ? document.all["Register_RequiredFieldValidator3"] : document.getElementById("Register_RequiredFieldValidator3");
Register_RequiredFieldValidator3.controltovalidate = "Register_TbxLastName";
Register_RequiredFieldValidator3.errormessage = "Debe escribir su apellido paterno";
Register_RequiredFieldValidator3.display = "Dynamic";
Register_RequiredFieldValidator3.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator3.initialvalue = "";
var Register_RegularExpressionValidator7 = document.all ? document.all["Register_RegularExpressionValidator7"] : document.getElementById("Register_RegularExpressionValidator7");
Register_RegularExpressionValidator7.controltovalidate = "Register_TbxLastName";
Register_RegularExpressionValidator7.errormessage = "Asegurate que sean s&oacute;lo letras";
Register_RegularExpressionValidator7.display = "Dynamic";
Register_RegularExpressionValidator7.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Register_RegularExpressionValidator7.validationexpression = "[a-zA-Z ]*$";
var Register_RegularExpressionValidator8 = document.all ? document.all["Register_RegularExpressionValidator8"] : document.getElementById("Register_RegularExpressionValidator8");
Register_RegularExpressionValidator8.controltovalidate = "Register_TbxFirstName";
Register_RegularExpressionValidator8.errormessage = "Asegurate que sean s&oacute;lo letras";
Register_RegularExpressionValidator8.display = "Dynamic";
Register_RegularExpressionValidator8.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Register_RegularExpressionValidator8.validationexpression = "[a-zA-Z]*$";
var Register_RequiredFieldValidator11 = document.all ? document.all["Register_RequiredFieldValidator11"] : document.getElementById("Register_RequiredFieldValidator11");
Register_RequiredFieldValidator11.controltovalidate = "Register_RdoBtnLstGender";
Register_RequiredFieldValidator11.errormessage = "El g&ecaute;nero es requerido";
Register_RequiredFieldValidator11.display = "Dynamic";
Register_RequiredFieldValidator11.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator11.initialvalue = "";
var Register_RequiredFieldValidator13 = document.all ? document.all["Register_RequiredFieldValidator13"] : document.getElementById("Register_RequiredFieldValidator13");
Register_RequiredFieldValidator13.controltovalidate = "Register_ddlDay";
Register_RequiredFieldValidator13.errormessage = "Seleccione su d&iacute;a de nacimiento";
Register_RequiredFieldValidator13.display = "Dynamic";
Register_RequiredFieldValidator13.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator13.initialvalue = "-1";
var Register_RequiredFieldValidator22 = document.all ? document.all["Register_RequiredFieldValidator22"] : document.getElementById("Register_RequiredFieldValidator22");
Register_RequiredFieldValidator22.controltovalidate = "Register_ddlMonth";
Register_RequiredFieldValidator22.errormessage = "Seleccione su mes de nacimiento";
Register_RequiredFieldValidator22.display = "Dynamic";
Register_RequiredFieldValidator22.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator22.initialvalue = "-1";
var Register_RequiredFieldValidator14 = document.all ? document.all["Register_RequiredFieldValidator14"] : document.getElementById("Register_RequiredFieldValidator14");
Register_RequiredFieldValidator14.controltovalidate = "Register_ddlAnio";
Register_RequiredFieldValidator14.errormessage = "Seleccione su a&ntilde;o de nacimiento";
Register_RequiredFieldValidator14.display = "Dynamic";
Register_RequiredFieldValidator14.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator14.initialvalue = "-1";
var Register_RegularExpressionValidator3 = document.all ? document.all["Register_RegularExpressionValidator3"] : document.getElementById("Register_RegularExpressionValidator3");
Register_RegularExpressionValidator3.controltovalidate = "Register_TbxEmail";
Register_RegularExpressionValidator3.errormessage = "El formato del correo electr&oacute;nico no es v&aacute;lido";
Register_RegularExpressionValidator3.display = "Dynamic";
Register_RegularExpressionValidator3.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Register_RegularExpressionValidator3.validationexpression = "\\w+([-+.\']\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*";
var Register_RequiredFieldValidator4 = document.all ? document.all["Register_RequiredFieldValidator4"] : document.getElementById("Register_RequiredFieldValidator4");
Register_RequiredFieldValidator4.controltovalidate = "Register_TbxEmail";
Register_RequiredFieldValidator4.errormessage = "Debe escribir su correo";
Register_RequiredFieldValidator4.display = "Dynamic";
Register_RequiredFieldValidator4.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator4.initialvalue = "";
var Register_RequiredFieldValidator5 = document.all ? document.all["Register_RequiredFieldValidator5"] : document.getElementById("Register_RequiredFieldValidator5");
Register_RequiredFieldValidator5.controltovalidate = "Register_TbxConfirmEmail";
Register_RequiredFieldValidator5.errormessage = "Debe confirmar su correo";
Register_RequiredFieldValidator5.display = "Dynamic";
Register_RequiredFieldValidator5.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator5.initialvalue = "";
var Register_CompareValidator1 = document.all ? document.all["Register_CompareValidator1"] : document.getElementById("Register_CompareValidator1");
Register_CompareValidator1.controltovalidate = "Register_TbxEmail";
Register_CompareValidator1.errormessage = "El correo electr&oacute;nico y su confirmaci&oacute;n deben coincidir";
Register_CompareValidator1.display = "Dynamic";
Register_CompareValidator1.evaluationfunction = "CompareValidatorEvaluateIsValid";
Register_CompareValidator1.controltocompare = "Register_TbxConfirmEmail";
Register_CompareValidator1.controlhookup = "Register_TbxConfirmEmail";
var Register_RequiredFieldValidator6 = document.all ? document.all["Register_RequiredFieldValidator6"] : document.getElementById("Register_RequiredFieldValidator6");
Register_RequiredFieldValidator6.controltovalidate = "Register_TbxPhone";
Register_RequiredFieldValidator6.errormessage = "El n&uacute;mero de celular es requerido";
Register_RequiredFieldValidator6.display = "Dynamic";
Register_RequiredFieldValidator6.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator6.initialvalue = "";
var Register_RegularExpressionValidator1 = document.all ? document.all["Register_RegularExpressionValidator1"] : document.getElementById("Register_RegularExpressionValidator1");
Register_RegularExpressionValidator1.controltovalidate = "Register_TbxPhone";
Register_RegularExpressionValidator1.errormessage = "El formato del n&uacute;mero de celular no es v&aacute;lido";
Register_RegularExpressionValidator1.display = "Dynamic";
Register_RegularExpressionValidator1.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Register_RegularExpressionValidator1.validationexpression = "^[\\d]{10}$";
var Register_RequiredFieldValidator8 = document.all ? document.all["Register_RequiredFieldValidator8"] : document.getElementById("Register_RequiredFieldValidator8");
Register_RequiredFieldValidator8.controltovalidate = "Register_TbxPostalCode";
Register_RequiredFieldValidator8.errormessage = "El C&oacute;digo postal es requerido";
Register_RequiredFieldValidator8.display = "Dynamic";
Register_RequiredFieldValidator8.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator8.initialvalue = "";
var Register_RegularExpressionValidator5 = document.all ? document.all["Register_RegularExpressionValidator5"] : document.getElementById("Register_RegularExpressionValidator5");
Register_RegularExpressionValidator5.controltovalidate = "Register_TbxPostalCode";
Register_RegularExpressionValidator5.errormessage = "C&oacute;digo Postal inv&aacute;lido";
Register_RegularExpressionValidator5.display = "Dynamic";
Register_RegularExpressionValidator5.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Register_RegularExpressionValidator5.validationexpression = "^[\\d]{5}$";
var Register_RequiredFieldValidator9 = document.all ? document.all["Register_RequiredFieldValidator9"] : document.getElementById("Register_RequiredFieldValidator9");
Register_RequiredFieldValidator9.controltovalidate = "Register_TbxPassword";
Register_RequiredFieldValidator9.errormessage = "La contrase&ntilde;a es requerida";
Register_RequiredFieldValidator9.display = "Dynamic";
Register_RequiredFieldValidator9.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator9.initialvalue = "";
var Register_RegularExpressionValidator6 = document.all ? document.all["Register_RegularExpressionValidator6"] : document.getElementById("Register_RegularExpressionValidator6");
Register_RegularExpressionValidator6.controltovalidate = "Register_TbxPassword";
Register_RegularExpressionValidator6.errormessage = "La contrase&ntilde;a debe ser de m&iacute;nimo 6 caracteres";
Register_RegularExpressionValidator6.display = "Dynamic";
Register_RegularExpressionValidator6.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Register_RegularExpressionValidator6.validationexpression = ".{6,30}";
var Register_RequiredFieldValidator10 = document.all ? document.all["Register_RequiredFieldValidator10"] : document.getElementById("Register_RequiredFieldValidator10");
Register_RequiredFieldValidator10.controltovalidate = "Register_TbxConfirmPassword";
Register_RequiredFieldValidator10.errormessage = "La confirmaci&oacute;n de la contrase&ntilde;a es requerida";
Register_RequiredFieldValidator10.display = "Dynamic";
Register_RequiredFieldValidator10.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Register_RequiredFieldValidator10.initialvalue = "";
var Register_CompareValidator2 = document.all ? document.all["Register_CompareValidator2"] : document.getElementById("Register_CompareValidator2");
Register_CompareValidator2.controltovalidate = "Register_TbxConfirmPassword";
Register_CompareValidator2.errormessage = "La contrase&ntilde;a y su confirmaci&oacute;n deben coincidir";
Register_CompareValidator2.display = "Dynamic";
Register_CompareValidator2.evaluationfunction = "CompareValidatorEvaluateIsValid";
Register_CompareValidator2.controltocompare = "Register_TbxPassword";
Register_CompareValidator2.controlhookup = "Register_TbxPassword";
var Register_CustomValidator1 = document.all ? document.all["Register_CustomValidator1"] : document.getElementById("Register_CustomValidator1");
Register_CustomValidator1.errormessage = "Asegurate de Aceptar los T&oacute;rminos y Condiciones";
Register_CustomValidator1.display = "Dynamic";
Register_CustomValidator1.evaluationfunction = "CustomValidatorEvaluateIsValid";
Register_CustomValidator1.clientvalidationfunction = "ValidateCheckBoxList";
var Register_CustomValidator2 = document.all ? document.all["Register_CustomValidator2"] : document.getElementById("Register_CustomValidator2");
Register_CustomValidator2.errormessage = "Asegurate de Aceptar el Aviso de Privacidad";
Register_CustomValidator2.display = "Dynamic";
Register_CustomValidator2.evaluationfunction = "CustomValidatorEvaluateIsValid";
Register_CustomValidator2.clientvalidationfunction = "ValidateCheckBoxList2";
var Layout_2_RequiredFieldValidator1 = document.all ? document.all["Layout_2_RequiredFieldValidator1"] : document.getElementById("Layout_2_RequiredFieldValidator1");
Layout_2_RequiredFieldValidator1.controltovalidate = "Layout_2_TbxNameContact";
Layout_2_RequiredFieldValidator1.errormessage = "Debe escribir su nombre";
Layout_2_RequiredFieldValidator1.display = "Dynamic";
Layout_2_RequiredFieldValidator1.validationGroup = "ContactValidation";
Layout_2_RequiredFieldValidator1.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Layout_2_RequiredFieldValidator1.initialvalue = "";
var Layout_2_RequiredFieldValidator2 = document.all ? document.all["Layout_2_RequiredFieldValidator2"] : document.getElementById("Layout_2_RequiredFieldValidator2");
Layout_2_RequiredFieldValidator2.controltovalidate = "Layout_2_TbxEmailContact";
Layout_2_RequiredFieldValidator2.errormessage = "Debe escribir su correo";
Layout_2_RequiredFieldValidator2.display = "Dynamic";
Layout_2_RequiredFieldValidator2.validationGroup = "ContactValidation";
Layout_2_RequiredFieldValidator2.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Layout_2_RequiredFieldValidator2.initialvalue = "";
var Layout_2_RegularExpressionValidator1 = document.all ? document.all["Layout_2_RegularExpressionValidator1"] : document.getElementById("Layout_2_RegularExpressionValidator1");
Layout_2_RegularExpressionValidator1.controltovalidate = "Layout_2_TbxEmailContact";
Layout_2_RegularExpressionValidator1.errormessage = "El formato de correo electr&oacute;nico no es v&aacute;lido";
Layout_2_RegularExpressionValidator1.display = "Dynamic";
Layout_2_RegularExpressionValidator1.validationGroup = "ContactValidation";
Layout_2_RegularExpressionValidator1.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Layout_2_RegularExpressionValidator1.validationexpression = "\\w+([-+.\']\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*";
var Layout_2_RegularExpressionValidator2 = document.all ? document.all["Layout_2_RegularExpressionValidator2"] : document.getElementById("Layout_2_RegularExpressionValidator2");
Layout_2_RegularExpressionValidator2.controltovalidate = "Layout_2_TbxPhoneContact";
Layout_2_RegularExpressionValidator2.errormessage = "El tel&eacute;fono es de 10 d&iacute;gitos y s&oacute;lo n&uacute;meros";
Layout_2_RegularExpressionValidator2.display = "Dynamic";
Layout_2_RegularExpressionValidator2.validationGroup = "ContactValidation";
Layout_2_RegularExpressionValidator2.evaluationfunction = "RegularExpressionValidatorEvaluateIsValid";
Layout_2_RegularExpressionValidator2.validationexpression = "^[\\d]{10}$";
var Layout_2_RequiredFieldValidator4 = document.all ? document.all["Layout_2_RequiredFieldValidator4"] : document.getElementById("Layout_2_RequiredFieldValidator4");
Layout_2_RequiredFieldValidator4.controltovalidate = "Layout_2_TbxCommentContact";
Layout_2_RequiredFieldValidator4.errormessage = "Debe escribir su duda o comentario";
Layout_2_RequiredFieldValidator4.display = "Dynamic";
Layout_2_RequiredFieldValidator4.validationGroup = "ContactValidation";
Layout_2_RequiredFieldValidator4.evaluationfunction = "RequiredFieldValidatorEvaluateIsValid";
Layout_2_RequiredFieldValidator4.initialvalue = "";
//]]>
</script>


		<script type="text/javascript">
//<![CDATA[

var Page_ValidationActive = false;
if (typeof(ValidatorOnLoad) == "function") {
    ValidatorOnLoad();
}

function ValidatorOnSubmit() {
    if (Page_ValidationActive) {
        return ValidatorCommonOnSubmit();
    }
    else {
        return true;
    }
}
        
theForm.oldSubmit = theForm.submit;
theForm.submit = WebForm_SaveScrollPositionSubmit;

theForm.oldOnSubmit = theForm.onsubmit;
theForm.onsubmit = WebForm_SaveScrollPositionOnSubmit;
//]]>
</script>
	</form>
	<script src="js/vendor/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.progresstimer.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
	<script src="js/custom.js"></script>
	<script
		src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"
		type="text/javascript"></script>
	<!--Google Analytics-->
	<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-6153327-54', 'auto');
      ga('send', 'pageview');

    </script>
	<script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 1029164455;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
	<script type="text/javascript"
		src="http://www.googleadservices.com/pagead/conversion.js"></script>
	<noscript>
		<div style="display: inline;">
			<img height="1" width="1" style="border-style: none;" alt=""
				src="http://googleads.g.doubleclick.net/pagead/viewthroughconversion/1029164455/?guid=ON&amp;script=0" />
		</div>
	</noscript>
</body>


</html>
