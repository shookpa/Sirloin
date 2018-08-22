

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<title>Estado de Cuenta</title>
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
<script src="js/vendor/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="js/DataTable.js" type="text/javascript"></script>
</head>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<body data-spy="scroll">
	<form method="post" action="#"
		id="form1">
		<div class="aspNetHidden">
			<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="" />
			<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT"
				value="" /> <input type="hidden" name="__LASTFOCUS" id="__LASTFOCUS"
				value="" /> <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE"
				value="/wEPDwUKMjA1MzQyNTc5OA9kFgJmD2QWAgIDD2QWDAIBD2QWBmYPFgIeB1Zpc2libGVoFgQCAQ9kFgICAQ8PFgIeCEltYWdlVXJsBRl+L2ltYWdlcy9wcm9maWxlL3VzZXIucG5nZGQCAw8WAh4JaW5uZXJodG1sBY4RPGRpdiBpZD0nbWFpbi1zbGlkZXInIGNsYXNzPSdjYXJvdXNlbCBzbGlkZScgZGF0YS1yaWRlPSdjYXJvdXNlbCc+PG9sIGNsYXNzPSdjYXJvdXNlbC1pbmRpY2F0b3JzIGhpZGRlbi14cyc+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzAnIGNsYXNzPSdhY3RpdmUnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzEnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzInPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzMnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzQnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzUnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzYnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzcnPjwvbGk+PC9vbD48ZGl2IGNsYXNzPSdjYXJvdXNlbC1pbm5lcicgb25kcmFnc3RhcnQ9J3JldHVybiBmYWxzZTsnIG9uY29udGV4dG1lbnU9J3JldHVybiBmYWxzZTsnPjxkaXYgY2xhc3M9J2l0ZW0gYWN0aXZlJz48YSBocmVmPSdodHRwOi8vd3d3LmNpZWxpdG9xdWVyaWRvLmNvbS5teCcgdGFyZ2V0PSdfYmxhbmsnPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUxNC5qcGcnIGFsdD0nc2xpZGVyJz48L2E+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGEgaHJlZj0naHR0cDovL3d3dy5jaWVsaXRvcXVlcmlkby5jb20ubXgvJyB0YXJnZXQ9J19ibGFuayc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTExLnBuZycgYWx0PSdzbGlkZXInPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdpdGVtJz48YSBocmVmPSdodHRwOi8vd3d3LmNpZWxpdG9xdWVyaWRvLmNvbS5teC8nIHRhcmdldD0nX2JsYW5rJz48aW1nIGNsYXNzPSdpbWctcmVzcG9uc2l2ZScgc3JjPSdpbWFnZXMvc2xpZGVyL3NsaWRlMTAuanBnJyBhbHQ9J3NsaWRlcic+PC9hPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUxLmpwZycgYWx0PSdzbGlkZXInPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUyLmpwZycgYWx0PSdzbGlkZXInPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUzLmpwZycgYWx0PSdzbGlkZXInPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxhIGhyZWY9J2h0dHA6Ly93d3cuY2llbGl0b3F1ZXJpZG8uY29tLm14LycgdGFyZ2V0PSdfYmxhbmsnPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGU0LmpwZycgYWx0PSdzbGlkZXInPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdpdGVtJz48YSBocmVmPSdodHRwOi8vd3d3LmNpZWxpdG9xdWVyaWRvLmNvbS5teC8nIHRhcmdldD0nX2JsYW5rJz48aW1nIGNsYXNzPSdpbWctcmVzcG9uc2l2ZScgc3JjPSdpbWFnZXMvc2xpZGVyL3NsaWRlNS5qcGcnIGFsdD0nc2xpZGVyJz48L2E+PC9kaXY+PC9kaXY+PGEgaHJlZj0nI21haW4tc2xpZGVyJyBjbGFzcz0nbGVmdCBjYXJvdXNlbC1jb250cm9sJyByb2xlPSdidXR0b24nIGRhdGEtc2xpZGU9J3ByZXYnPiA8c3BhbiBjbGFzcz0nZ2x5cGhpY29uIGdseXBoaWNvbi1jaGV2cm9uLWxlZnQnIGFyaWEtaGlkZGVuPSd0cnVlJz48L3NwYW4+IDxzcGFuIGNsYXNzPSdzci1vbmx5Jz5BbnRlcmlvcjwvc3Bhbj48L2E+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8YSBocmVmPScjbWFpbi1zbGlkZXInIGNsYXNzPSdyaWdodCBjYXJvdXNlbC1jb250cm9sJyByb2xlPSdidXR0b24nIGRhdGEtc2xpZGU9J25leHQnPjxzcGFuIGNsYXNzPSdnbHlwaGljb24gZ2x5cGhpY29uLWNoZXZyb24tcmlnaHQnIGFyaWEtaGlkZGVuPSd0cnVlJz48L3NwYW4+PHNwYW4gY2xhc3M9J3NyLW9ubHknPlNpZ3VpZW50ZTwvc3Bhbj48L2E+PC9kaXY+ZAIBD2QWCgIDDw8WAh8BBRl+L2ltYWdlcy9wcm9maWxlL3VzZXIucG5nZGQCBQ8WAh8CBQpCaWVudmVuaWRvZAIHDxYCHwIFLTxzcGFuIGNsYXNzPSd1c2VybmFtZS1mbCc+TTwvc3Bhbj5pZ3VlbCBBbmdlbGQCCw8WBB8CBY4RPGRpdiBpZD0nbWFpbi1zbGlkZXInIGNsYXNzPSdjYXJvdXNlbCBzbGlkZScgZGF0YS1yaWRlPSdjYXJvdXNlbCc+PG9sIGNsYXNzPSdjYXJvdXNlbC1pbmRpY2F0b3JzIGhpZGRlbi14cyc+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzAnIGNsYXNzPSdhY3RpdmUnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzEnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzInPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzMnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzQnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzUnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzYnPjwvbGk+PGxpIGRhdGEtdGFyZ2V0PScjbWFpbi1zbGlkZXInIGRhdGEtc2xpZGUtdG89JzcnPjwvbGk+PC9vbD48ZGl2IGNsYXNzPSdjYXJvdXNlbC1pbm5lcicgb25kcmFnc3RhcnQ9J3JldHVybiBmYWxzZTsnIG9uY29udGV4dG1lbnU9J3JldHVybiBmYWxzZTsnPjxkaXYgY2xhc3M9J2l0ZW0gYWN0aXZlJz48YSBocmVmPSdodHRwOi8vd3d3LmNpZWxpdG9xdWVyaWRvLmNvbS5teCcgdGFyZ2V0PSdfYmxhbmsnPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUxNC5qcGcnIGFsdD0nc2xpZGVyJz48L2E+PC9kaXY+PGRpdiBjbGFzcz0naXRlbSc+PGEgaHJlZj0naHR0cDovL3d3dy5jaWVsaXRvcXVlcmlkby5jb20ubXgvJyB0YXJnZXQ9J19ibGFuayc+PGltZyBjbGFzcz0naW1nLXJlc3BvbnNpdmUnIHNyYz0naW1hZ2VzL3NsaWRlci9zbGlkZTExLnBuZycgYWx0PSdzbGlkZXInPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdpdGVtJz48YSBocmVmPSdodHRwOi8vd3d3LmNpZWxpdG9xdWVyaWRvLmNvbS5teC8nIHRhcmdldD0nX2JsYW5rJz48aW1nIGNsYXNzPSdpbWctcmVzcG9uc2l2ZScgc3JjPSdpbWFnZXMvc2xpZGVyL3NsaWRlMTAuanBnJyBhbHQ9J3NsaWRlcic+PC9hPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUxLmpwZycgYWx0PSdzbGlkZXInPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUyLmpwZycgYWx0PSdzbGlkZXInPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGUzLmpwZycgYWx0PSdzbGlkZXInPjwvZGl2PjxkaXYgY2xhc3M9J2l0ZW0nPjxhIGhyZWY9J2h0dHA6Ly93d3cuY2llbGl0b3F1ZXJpZG8uY29tLm14LycgdGFyZ2V0PSdfYmxhbmsnPjxpbWcgY2xhc3M9J2ltZy1yZXNwb25zaXZlJyBzcmM9J2ltYWdlcy9zbGlkZXIvc2xpZGU0LmpwZycgYWx0PSdzbGlkZXInPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdpdGVtJz48YSBocmVmPSdodHRwOi8vd3d3LmNpZWxpdG9xdWVyaWRvLmNvbS5teC8nIHRhcmdldD0nX2JsYW5rJz48aW1nIGNsYXNzPSdpbWctcmVzcG9uc2l2ZScgc3JjPSdpbWFnZXMvc2xpZGVyL3NsaWRlNS5qcGcnIGFsdD0nc2xpZGVyJz48L2E+PC9kaXY+PC9kaXY+PGEgaHJlZj0nI21haW4tc2xpZGVyJyBjbGFzcz0nbGVmdCBjYXJvdXNlbC1jb250cm9sJyByb2xlPSdidXR0b24nIGRhdGEtc2xpZGU9J3ByZXYnPiA8c3BhbiBjbGFzcz0nZ2x5cGhpY29uIGdseXBoaWNvbi1jaGV2cm9uLWxlZnQnIGFyaWEtaGlkZGVuPSd0cnVlJz48L3NwYW4+IDxzcGFuIGNsYXNzPSdzci1vbmx5Jz5BbnRlcmlvcjwvc3Bhbj48L2E+DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8YSBocmVmPScjbWFpbi1zbGlkZXInIGNsYXNzPSdyaWdodCBjYXJvdXNlbC1jb250cm9sJyByb2xlPSdidXR0b24nIGRhdGEtc2xp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b3gtZ2FsbGVyeT0nZ2FsbGVyeTEnPjxpbWcgc3JjPSdpbWFnZXMvcHJvbW90aW9ucy9wcm9tbzExLmpwZycgYWx0PScnIGNsYXNzPSdpbWctcmVzcG9uc2l2ZSBodnItZ3Jvdy1zaGFkb3cnPjwvYT48ZGl2IGNsYXNzPSdjb250X3Byb21vX2J0bic+PGRpdiBpZD0nc2VlUHJvbW8xMycgY2xhc3M9J2J0bi1zZWUtcHJvbW8gaHZyLXNpbmsnPlZlciBQcm9tb2Npw7NuPC9kaXY+PC9kaXY+PC9kaXY+PGRpdiBjbGFzcz0nY29sLXNtLTYnPjxhIGhyZWY9J2ltYWdlcy9wcm9tb3Rpb25zL3Byb21vOC5qcGcnIGRhdGEtbGlnaHRib3gtZ2FsbGVyeT0nZ2FsbGVyeTEnPjxpbWcgc3JjPSdpbWFnZXMvcHJvbW90aW9ucy9wcm9tbzguanBnJyBhbHQ9JycgY2xhc3M9J2ltZy1yZXNwb25zaXZlIGh2ci1ncm93LXNoYWRvdyc+PC9hPjwvZGl2PjxkaXYgY2xhc3M9J2JyLTUnPjwvZGl2PjxkaXYgY2xhc3M9J2NvbC1zbS02Jz48YSBocmVmPSdpbWFnZXMvcHJvbW90aW9ucy9wcm9tbzcuanBnJyBkYXRhLWxpZ2h0Ym94LWdhbGxlcnk9J2dhbGxlcnkxJz48aW1nIHNyYz0naW1hZ2VzL3Byb21vdGlvbnMvcHJvbW83LmpwZycgYWx0PScnIGNsYXNzPSdpbWctcmVzcG9uc2l2ZSBodnItZ3Jvdy1zaGFkb3cnPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdjb2wtc20tNic+PGEgaHJlZj0naW1hZ2VzL3Byb21vdGlvbnMvcHJvbW8xLmpwZycgZGF0YS1saWdodGJveC1nYWxsZXJ5PSdnYWxsZXJ5MSc+PGltZyBzcmM9J2ltYWdlcy9wcm9tb3Rpb25zL3Byb21vMS5qcGcnIGFsdD0nJyBjbGFzcz0naW1nLXJlc3BvbnNpdmUgaHZyLWdyb3ctc2hhZG93Jz48L2E+PC9kaXY+PGRpdiBjbGFzcz0nYnItNSc+PC9kaXY+PGRpdiBjbGFzcz0nY29sLXNtLTYnPjxhIGhyZWY9J2ltYWdlcy9wcm9tb3Rpb25zL3Byb21vMy5qcGcnIGRhdGEtbGlnaHRib3gtZ2FsbGVyeT0nZ2FsbGVyeTEnPjxpbWcgc3JjPSdpbWFnZXMvcHJvbW90aW9ucy9wcm9tbzMuanBnJyBhbHQ9JycgY2xhc3M9J2ltZy1yZXNwb25zaXZlIGh2ci1ncm93LXNoYWRvdyc+PC9hPjwvZGl2PjxkaXYgY2xhc3M9J2NvbC1zbS02Jz48YSBocmVmPSdpbWFnZXMvcHJvbW90aW9ucy9wcm9tbzQuanBnJyBkYXRhLWxpZ2h0Ym94LWdhbGxlcnk9J2dhbGxlcnkxJz48aW1nIHNyYz0naW1hZ2VzL3Byb21vdGlvbnMvcHJvbW80LmpwZycgYWx0PScnIGNsYXNzPSdpbWctcmVzcG9uc2l2ZSBodnItZ3Jvdy1zaGFkb3cnPjwvYT48L2Rpdj48ZGl2IGNsYXNzPSdici01Jz48L2Rpdj48ZGl2IGNsYXNzPSdjb2wtc20tNic+PGEgaHJlZj0naW1hZ2VzL3Byb21vdGlvbnMvcHJvbW8yLmpwZycgZGF0YS1saWdodGJveC1nYWxsZXJ5PSdnYWxsZXJ5MSc+PGltZyBzcmM9J2ltYWdlcy9wcm9tb3Rpb25zL3Byb21vMi5qcGcnIGFsdD0nJyBjbGFzcz0naW1nLXJlc3BvbnNpdmUgaHZyLWdyb3ctc2hhZG93Jz48L2E+PC9kaXY+ZAIBDxYCHwJlZAICDxYCHwIFjQE8c2NyaXB0IHR5cGU9J3RleHQvamF2YXNjcmlwdCc+JChmdW5jdGlvbigpeyQoJyNzZWVQcm9tbzEzJykuY2xpY2soZnVuY3Rpb24oKXt3aW5kb3cub3BlbignaHR0cDovL3d3dy5jaWVsaXRvcXVlcmlkby5jb20ubXgnKTt9KTt9KTs8L3NjcmlwdD5kAgMPZBYIAgEPDxYCHgRUZXh0BQxNaWd1ZWwgQW5nZWxkZAIFDw8WAh8DBRthbmdlbC5qYWltZUBpdHByb3RlYy5jb20ubXhkZAILDw8WAh8DBQo1NTU4NjU4NTczZGQCDw8PFgIfAwUgQnVlbmFzIHRhcmRlcyEsIG1lIGd1c3RhcsOtYSAuLi5kZAIEDxYEHwJlHwBoZAILD2QWAgIBD2QWAmYPZBYKAgEPFgIfAgUOUHVudG9zIENpZWxpdG9kAgMPFgIfAgUMMTAuMDAgcHVudG9zZAIFD2QWCgIBDxBkDxYMZgIBAgICAwIEAgUCBgIHAggCCQIKAgsWDBAFDEZlYnJlcm8gMjAxNwUDLTEwZxAFCk1hcnpvIDIwMTcFAi05ZxAFCkFicmlsIDIwMTcFAi04ZxAFCU1heW8gMjAxNwUCLTdnEAUKSnVuaW8gMjAxNwUCLTZnEAUKSnVsaW8gMjAxNwUCLTVnEAULQWdvc3RvIDIwMTcFAi00ZxAFD1NlcHRpZW1icmUgMjAxNwUCLTNnEAUMT2N0dWJyZSAyMDE3BQItMmcQBQ5Ob3ZpZW1icmUgMjAxNwUCLTFnEAUORGljaWVtYnJlIDIwMTcFATBnEAUKRW5lcm8gMjAxOAUBMWcWAQILZAIDDxYCHwIFFU1lcyBkZSBFbmVybyBkZWwgMjAxOGQCBQ8WBB8CZR8AaGQCBw9kFgQCAQ8WAh8CBQUxMC4wMGQCAw8WAh8CBQUwMC4wMGQCCQ9kFgQCAQ8WAh8CBZQGPGRpdiBjbGFzcz0ndGFibGUtcmVzcG9uc2l2ZSB0YWJsZSc+PHRhYmxlIGNsYXNzPSd0YWJsZScgaWQ9J3RhYmxlJyBzdHlsZT0nYmFja2dyb3VuZC1jb2xvcjp0cmFuc3BhcmVudCc+PHRoZWFkPjx0cj48dGggY2xhc3M9J2NlbnRlcic+RmVjaGE8L3RoPjx0aCBjbGFzcz0nY2VudGVyJz5Fc3RhYmxlY2ltaWVudG88L3RoPjx0aCBjbGFzcz0nY2VudGVyJz5Db25jZXB0bzwvdGg+PHRoIGNsYXNzPSdjZW50ZXInPlB1bnRvcyBhY3VtdWxhZG9zPC90aD48dGggY2xhc3M9J2NlbnRlcic+UHVudG9zIHJlZGltaWRvczwvdGg+PC90cj48L3RoZWFkPjx0Ym9keT48dHI+PHRkIGRhdGEtdGl0bGU9J0ZlY2hhJz4yMDE4LTAxLTAzPC90ZD48dGQgZGF0YS10aXRsZT0nRXN0YWJsZWNpbWllbnRvJz5DUUMgQ09TTU9QT0w8L3RkPjx0ZCBkYXRhLXRpdGxlPSdUcmFuc2FjY2lvbic+QUNUSVZBQ0lPTiBERSBUQVJKRVRBPC90ZD48dGQgZGF0YS10aXRsZT0nQWN1bXVsYWRvcyc+MDAuMDA8L3RkPjx0ZCBkYXRhLXRpdGxlPSdSZWRpbWlkb3MnPjAwLjAwPC90ZD48L3RyPjx0cj48dGQgZGF0YS10aXRsZT0nRmVjaGEnPjIwMTgtMDEtMDM8L3RkPjx0ZCBkYXRhLXRpdGxlPSdFc3RhYmxlY2ltaWVudG8nPlDDoWdpbmEgV2ViPC90ZD48dGQgZGF0YS10aXRsZT0nVHJhbnNhY2Npb24nPlJFR0lTVFJPIERFIERBVE9TPC90ZD48dGQgZGF0YS10aXRsZT0nQWN1bXVsYWRvcyc+MTAuMDA8L3RkPjx0ZCBkYXRhLXRpdGxlPSdSZWRpbWlkb3MnPjAwLjAwPC90ZD48L3RyPjwvdGJvZHk+PC90YWJsZT48L2Rpdj5kAgMPFgIfAgUSPGJyIC8+MTAuMDAgUHVudG9zZAIHDxYCHwIFB0ZlYnJlcm9kAgkPFgIfAgUQMCBQdW50b3MgQ2llbGl0b2RkiDOXHuhTa3z1Ph1xqNWlBdisD+Y=" />
		</div>

		<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}

if(sessionStorage.getItem("logueado")!="true")
	location.replace("index.php");		
$(document).ready(function() {
	
	$.ajax({
		url: "php/obtainUser.php",
		type: "POST",
		dataType: "JSON",
		data: {store_data: [{idUser: sessionStorage.getItem("iduser")
			}]}, //body
		success: function (resultado) {
			console.debug('ajax1 success', resultado);
			if(resultado.success)
			{				
			
				$('#nombreUsuario').text(resultado.nombre + ' '+resultado.a_paterno+' '+resultado.a_materno);
				
				
			}			
// 			else
// 				alert(resultado.mensaje);
			
		
	    },
	    error: function (xhr, ajaxOptions, thrownError) {
	    	console.log(xhr);
// 	    	alert("Verificar informacion ingresada");
	    }
	});
	$.ajax({
		url: "php/obtainMovimientosUser.php",
		type: "POST",
		dataType: "JSON",
		data: {store_data: [{idUser: sessionStorage.getItem("iduser")
			}]}, //body
		success: function (resultado) {
			console.debug('ajax1 success', resultado);
			if(resultado.success)
			{				
				$('#tablaMovimientos').DataTable( {
			        data: resultado.data,
			        
			        columns: [			        	
			            { "data": "nombre_restaurante" ,title: "Restaurante" },
			            { "data": "user" ,title: "Tarjeta" },
			            { "data": "fec_vip" ,title: "Fecha" },
			            { "data": "det_vip" ,title: "Movimiento" },
			            { "data": "mon_vip" ,title: "Monto" }
			            
			        ]
			    } );			
				
			}			
// 			else
// 				alert(resultado.mensaje);
			
		
	    },
	    error: function (xhr, ajaxOptions, thrownError) {
	    	console.log(xhr);
// 	    	alert("Verificar informacion ingresada");
	    }
	});

	$.ajax({
		url: "php/obtainSaldosUser.php",
		type: "POST",
		dataType: "JSON",
		data: {store_data: [{idUser: sessionStorage.getItem("iduser")
			}]}, //body
		success: function (resultado) {
			console.debug('ajax1 success', resultado);
			if(resultado.success)
			{				
				$('#tablaSaldos').DataTable( {
			        data: resultado.data,		
			        "paging":   false,
			        "ordering": false,
			        "info":     false,
			        "searching":     false,			        
			        	        
			        columns: [
			            { "data": "user" ,title: "Tarjeta" },
			            { "data": "pto_vip" ,title: "Saldo en puntos" }
			        ]
			    } );			
				
			}			
// 			else
// 				alert(resultado.mensaje);
			
		
	    },
	    error: function (xhr, ajaxOptions, thrownError) {
	    	console.log(xhr);
// 	    	alert("Verificar informacion ingresada");
	    }
	});
			
		       
			
});
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
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

		<!-- Men� -->


		<!--Men� Principal An�nimo-->

		<!--Termina Men� Principal An�nimo-->

		<!--Men� Principal del Cliente Logueado-->
		<div id="Menu_cont_menu_user">
			<div class="site-header" ondragstart="return false;"
				oncontextmenu="return false;">
				<div class="main-headerfix" id="main-header">
					<div class="container-fluid">
						<div id="menu-wrapper">
							<div class="row">
								<div class="logo-movil hidden-md hidden-lg">
									<div class="logo_cielito_corazon">
										<a href="Home.aspx"><img
											src="images/logo/logo_header_movil.png"></a>
									</div>
								</div>
								<div class="logoindex hidden-sm hidden-xs">
									<div class="logo_cielito_corazon">
										<a href="Home.aspx"><img src="images/logo/logo_header.png"
											alt="" /></a>
									</div>
								</div>
								<!-- /.logo -->
								<div class="col-md-12 col-sm-12 main-menu menu-cielito">
									
									<center>
										<ul class="menu-first hidden-sm hidden-xs">
											<li><a href="#quees">Programa de Puntos</a></li>
											<li class="menu-bullet">|</li>
											<li><a href="#como" id="howitwork">�C�mo funciona?</a></li>
											<li class="menu-bullet">|</li>
											<li><a href="#promociones" id="promotions">Promociones</a></li>
											<li class="menu-bullet">|</li>
											<li><a href="#contact" id="contacto">Soporte</a></li>
											<li class="menu-bullet">|</li>
											<li id="li_active"><a href="#account" id="myaccount">Mi
													cuenta</a></li>
											<li class="menu-bullet">|</li>
											<li><a href="#close_session" id="close_session">Cerrar Sesi�n</a></li>
										</ul>
									</center>
									<a href="#" class="toggle-menu visible-sm visible-xs"><i
										class="fa fa-bars"></i></a>
								</div>
								<!-- /.main-menu -->
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="cont-welcome-profile">
										<img id="Menu_img_profile" class="img-profile"
											ondragstart="return false" oncontextmenu="return false"
											src="images/profile/user.png" />
									</div>
									<div class="text-welcome-cont">
										<span id="Menu_welcome">Bienvenido</span> <span
											class="menu-bullet-2">: </span>
										<div id="Menu_welcomeName" class="username">
											<span class='username-fl' id='nombreUsuario'></span>
										</div>
									</div>
								</div>
							</div>
							<!-- /.row -->
						</div>
						<!-- /#menu-wrapper -->

						<div class="menu-responsive hidden-md hidden-lg">
							<ul>
								<li><a href="#quees" id="mobilewhatis">�Qu� es?</a></li>
								<li><a href="#como" id="mobilehowitwork">�C�mo funciona?</a></li>
								<li><a href="#promociones" id="mobilepromotions">Promociones</a>
								</li>
								<li><a href="#contact" id="mobilecontact">Soporte</a></li>								
								<li id="li_activemobile"><a href="#account" id="mobilemyaccount">Mi
										cuenta</a></li>
								<li><input type="submit" name="ctl00$Menu$CloseSessionMobile"
									value="Cerrar sesi�n" id="Menu_CloseSessionMobile"
									class="btn_close_session" /></li>
							</ul>
						</div>
						<!-- /.menu-responsive -->
					</div>
					<!-- /.container -->
				</div>
				<!-- /.main-header -->
			</div>
			<!-- /.site-header -->

			<!--Contenedor del Slider Principal-->

			<!--Termina contenedor de Slider Principal-->

			<!--HiddenField para validar con JQuery c�mo se muestra el men�-->
			<input type="hidden" name="ctl00$Menu$HfIsInAccount"
				id="Menu_HfIsInAccount" value="1" /> <input type="hidden"
				name="ctl00$Menu$HfIsAnonymous" id="Menu_HfIsAnonymous" value="0" />

			<!--Men� de la cuenta-->
			<div id="Menu_cont_menu_account" ondragstart="return false;"
				oncontextmenu="return false;">
				<div class="vaciotop" id="account"></div>
				<div class="br-4 hidden-xs"></div>
				<!--New Menu-->
				<div class="col-sm-12 cont-main-menu">
					<div class="row">
						<div id="Menu_section_personal_data"
							class="col-sm-6 col-xs-12 item-1 cursor hvr-pop">
							<div class="boton-section">
								<center>
									<img id="Menu_ImgPersonalData"
										src="images/iconos/datos-personales-2.png"
										style="width: 200px;" />
								</center>
							</div>
						</div>
						<div id="Menu_section_account_status"
							class="col-sm-6 col-xs-12 item-2 cursor hvr-pop">
							<div class="boton-section">
								<center>
									<img id="Menu_ImgAccountState"
										src="images/iconos/estado-cuenta.png" style="width: 200px;" />
								</center>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
		<!--Termina Men� Principal del Cliente Logueado-->

		<!--Modal Container-->
		<div id="Menu_cont_modals"></div>

		<script type="text/javascript" src="js/menu_logueado.js"></script>


		<!-- Login -->


		<!--Layout (�Qu� es?)-->


		<!--Registro-->


		<!--Layout �C�mo funciona?-->


		<!--Content-->

		<div id="ContentPlaceHolder1_PnlContent">

			<script
				src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"
				type="text/javascript"></script>

			<!-- contenido -->
			<section class="content-section" ondragstart="return false;"
				oncontextmenu="return false;">
				
				<div class="container">
					<div class="heading-section col-md-12 text-center">
						<h2 class="text-uppercase text-red">Estado de Cuenta</h2>
						<div class="clearfix"></div>
						<div class="col-md-12 current-points">
<!-- 							Saldo en <span id="ContentPlaceHolder1_ctl00_account_type" -->
<!-- 								class="span-pm">Puntos</span> al d&iacute;a de hoy: <span -->
<!-- 								id="ContentPlaceHolder1_ctl00_ActualPoints" -->
<!-- 								class="span-current-points">10.00 puntos</span> -->
							<table id="tablaSaldos" class="display" width="100%"></table>
 						</div> 

						
						
						<div id="ContentPlaceHolder1_ctl00_PanelTransactions">

							<div class="br-5"></div>
							<h3>Transacciones</h3>
						

							<!---->
							<div class="clearfix"></div>
						
							
							<div id="ContentPlaceHolder1_ctl00_cont_transactions">
								<div class="title">Detalle del periodo</div>
								<div id="ContentPlaceHolder1_ctl00_transactions_rec">
									<div class='table-responsive table'>
									<table id="tablaMovimientos" class="display" width="100%"></table>

									</div>
								</div>
								<div class="clearfix"></div>
								
								<div class="clearfix"></div>
							</div>
						</div>						
						<div class="br-4"></div>
						<div
							class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 expiration-text">
							<i class="fa fa-calendar" aria-hidden="true"></i> <i
								class="fa fa-check-circle" aria-hidden="true"></i> 
								PENDIENTE EL TEXTO DE La vigencia los puntos.
						</div>
					</div>
				</div>
				<!-- /container -->
			</section>
			<script type="text/javascript">
			    $(function () {
			        $("[id^='table']").each(function () {
			            formatearTabla($(this));
			        });
			    });
			</script>
		</div>


		<!-- Footer -->
		<div class="br-5 bg-grey"></div>
		<div class="bg-grey">
			<div class="container bg-grey" ondragstart="return false;"
				oncontextmenu="return false;">
<!-- 				<a href="http://www.bluepureloyalty.com/" target="_blank"><img -->
<!-- 					src="images/PoweredByBlue.png" alt="" class="pull-right powered" /></a> -->
			</div>
		</div>

		<div class="container-fluid footermodal">
			<div class="">
				<ul>
					<li><a href="#terminos" data-toggle="modal">T�rminos y
							Condiciones</a></li>
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
					<a href="http://www.itprotec.com.mx/" target="_blank"><img
						src="images/icono_blue.png" alt="" />itprotec.com.mx</a>
				</center>
			</div>
			<div class="text-center">
				<a href="http://www.bluepureloyalty.com/" class="bluemx"
					target="_blank"></a>
			</div>
		</div>

	<!--TeRMINOS Y CONDICIONES-->
		<div class="modal face" id="terminos">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button style="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h2 class="modal-title page-header text-center"><strong>T�RMINOS Y CONDICIONES DE<br />SIRLOIN STOCKADE<br/><center>Programa de Puntos VIP</center></strong></h2>
                        <br />                      
                        <p class="text-justify">
                            <strong>TARJETA DE BENEFICIOS</strong>
                            <br />
                            Porque nos gusta consentir, premiar y distinguir la fidelidad de nuestros Clientes m�s valiosos, creamos un Programa de Puntos a trav�s de una tarjeta de fidelidad para recompensar tu preferencia,
que tendr� grandes beneficios para ti. Podr�s utilizar y gozar de tu Tarjeta de Programa de Puntos VIP
y otros beneficios como descuentos, promociones, etc., exclusivamente en todas las sucursales del
Restaurante Sirloin Stockade de la CDMX.
                        </p>
                        <p class="text-justify">
                            <strong>�C�MO OBTENERLA</strong>
                            <br />
                            Podr�s obtener tu tarjeta de Programa de Puntos VIP en cualquier Resturante Sirloin Stockade de la CDMX, con un costo de $50.00 pesos (cincuenta pesos 00/100 M.N).<br/>
                            Llena una solicitud de inscripci�n para la adquisici�n de la Tarjeta, acepta el aviso de privacidad y uso de datos personales.<br/>
                            Con el Ticket de compra de tu Tarjeta y la solicitud de inscripci�n completamente llenada, se
realizar� la activaci�n de tu tarjeta.<br/>
Los puntos acumulados en tu Tarjeta tienen una VIGENCIA hasta el 28 de febrero de cada a�o. Si no utilizas los puntos antes de la fecha anteriormente indicada se perder�n. Los puntos ser�n personales e intransferibles, no se pueden regalar, prestar o vender.
                        </p>
                        <p class="text-justify">
                            <strong>BENEFICIOS Y LINEAMIENTOS</strong>
                            <br />
                            La Tarjeta de Programa de Puntos VIP, as� como sus beneficios, lineamientos, descuentos y
promociones anunciados, ser�n v�lidos y aplicados exclusivamente en todas las sucursales del Restaurante Sirloin Stockade de la CDMX.<br/>
En cada visita que realices obtendr�s un 10% (diez por ciento) del monto total de tu compra en puntos, cada punto acumulado equivale a $1.00 peso (un peso 00/100 M.N), que podr�s utilizar como dinero en tus siguientes visitas. Por lo que, de manera autom�tica se acumular�n los puntos correspondientes a los consumos realizados.<br/>
Los puntos deber�n acumularse en el momento de la compra. Es indispensable presentar tu Tarjeta de Programa de Puntos VIP Sirloin Stockade al inicio de la transacci�n de compra para poder abonar tus puntos, de lo contrario no ser� posible acumular tus puntos y no se podr� hacer posterior a la compra. Los puntos obtenidos ser�n abonados a tu tarjeta dentro de las 24 hrs., siguientes a la transacci�n o compra realizada, por lo que podr�s hacer uso de esos puntos pasando dicho t�rmino.<br/>
Nos reservamos el derecho discrecional de terminar con el uso o aplicaci�n de beneficios de las Tarjetas en cualquier momento, debiendo notificar previamente dicha situaci�n a nuestros Clientes. Con posterioridad a la fecha de terminaci�n que se hayan establecido, los puntos y cualesquier otro aspecto relacionado directa o indirectamente con las Tarjetas concluir� definitivamente en la fecha que as� se se�ale y por lo tanto dejar�n de ser v�lidos, precisamente a partir de dicha fecha de terminaci�n. <br/>
Bajo ninguna circunstancia se realizar�n transferencias de saldos entre tarjetas, ni ser� canjeada por dinero en efectivo.<br/>
El usuario acepta que la tarjeta se rige por las pol�ticas y lineamientos establecidos por la empresa. Cualquier t�rmino y/o condici�n establecida con relaci�n a las promociones, lineamientos y beneficios, es en adici�n a las pol�ticas y lineamientos internos vigentes de la empresa, las cuales prevalecer�n en todo momento sobre el programa.<br/>
La cuota de inscripci�n o pago de la tarjeta no es reembolsable, ni ser�n abonados como puntos. El pago del consumo que hayan sido realizadas con los puntos acumulados o adquiridos, no generan puntos.<br/>
No nos hacemos responsables en caso de robo o extrav�o de las tarjetas proporcionadas, ni por el mal uso que se haga de ella, toda vez que es responsabilidad del Cliente que la recibi�. As� mismo, por el mal uso de la Tarjeta adquirida, el Cliente responder� de los da�os y perjuicios causados a la empresa o a terceros. Los puntos acumulados en caso de Robo o Extrav�o de la Tarjeta se perder�n autom�ticamente por lo que, no podr�n ser recuperados o transferidos a otra tarjeta.
                        </p>
                        <p class="text-justify">
                            <strong>CONFIDENCIALIDAD, USO DE DATOS PERSONALES Y AVISO DE PRIVASIDAD</strong>
                            <br />
                           Preservar tu privacidad y la seguridad de tu informaci�n personal es importante para nosotros por lo cual estamos comprometidos con la protecci�n de los Datos Personales de nuestros clientes. Cuidamos la privacidad de tus Datos para brindarte la confianza de que tus Datos Personales est�n protegidos. �nicamente las personas autorizadas tendr�n acceso a tus Datos Personales, con el prop�sito de brindarte un mejor servicio por parte de nosotros y as� evitar una divulgaci�n indebida.<br/>
                            Por favor, antes de proporcionarnos tus Datos Personales t�mate un momento para leer el siguiente Aviso de Privacidad. Todos tus Datos Personales ser�n tratados con base en los principios de licitud, consentimiento, informaci�n, responsabilidad y finalidad de conformidad con la Ley Federal de Protecci�n de Datos Personales en Posesi�n de los Particulares, su Reglamento y sus Lineamientos, tus Datos son recabados con la finalidad de brindarte productos o servicios y comunicarte promociones.<br/>
                            EXPERTOS COMENSALES DE M�XICO, S.A. DE C.V. (�Sirloin Stockade� D.F.), con domicilio
social en: Calzada de los Leones 171 102, Col. Las �guilas, Del. �lvaro Obreg�n, M�xico, Distrito Federal, C.P. 01710. Tel�fono: (01) 56519677, te comunican:<br/>
EXPERTOS COMENSALES DE MEXICO, S.A. DE C.V. solicita informaci�n personal de identidad de los usuarios de nuestros establecimientos, �nicamente de manera voluntaria para poder ver los servicios que ofrece el sitio. Los datos personales que requerimos son los siguientes:<br/>
i) Nombre; ii) E-Mail; iii) Tel�fono; iv) C.P; y vi) Fecha de Nacimiento.<br/>
Los datos personales recabados, tienen la finalidad de dar seguimiento al servicio, promociones, lanzamiento de nuevo productos, control del programa de puntos, evaluar nuestro servicio.<br/>
Para las finalidades mencionadas en el p�rrafo anterior, usted tiene un plazo de 5 d�as h�biles para manifestar su negativa al tratamiento de su informaci�n personal, enviando la misma al correo electr�nico avisodeprivacidad@sirloindf.com o comunic�ndose al 56519677.<br/>
NOTA: La informaci�n personal que requerimos no es considerada como sensible de acuerdo con la Ley Federal de Protecci�n d los procedimientos que hemos implementado. Para conocer dichos procedimientos, los requisitos, plazos, se pueden poner en contacto con nosotros a trav�s del correo electr�nico avisodeprivacidad@sirloindf.com o al tel�fono indicado.<br/>
Si usted desea limitar el uso y divulgaci�n de sus datos personales, concretamente, respecto al uso de su informaci�n personal para fines publicitarios o mercadot�cnicos, podr� solicitarlo a trav�s de nuestro departamento administrativo.<br/>
EXPERTOS COMENSALES DE MEXICO, S.A DE C.V. Podr� revelar Informaci�n cuando por mandato de ley y/o de autoridad competente le fuere requerido o por considerar de buena fe que dicha revelaci�n es necesaria para:<br/>
I) Cumplir con procesos legales;<br/>
II) Cumplir con el Convenio del Usuario;<br/>
III) Responder reclamaciones que involucren cualquier Contenido que menoscabe derechos de terceros o;<br/>
IV) Proteger los derechos, la propiedad, o la seguridad de Cortes y Bufetes de M�xico, sus Usuarios y el p�blico en general.<br/>
EXPERTOS COMENSALES DE MEXICO, S.A. DE C.V., se abstendr� de vender, arrendar o alquilar tus Datos Personales a un tercero; pero por razones de operaci�n y servicio podr�n ser transferidos �nicamente tus datos proporcionados con: Empresas encargadas de la emisi�n de tarjetas de programas de lealtad y art�culos promocionales. Empresas de Comunicaci�n, a efecto de mantenerte informado de nuestros eventos y promociones o de nuestros patrocinadores y socios comerciales, as� como, promocionales (propagandas, radio, T.V. etc.), empresas de investigaciones de mercado, para hacer evaluaciones del servicio.<br/>
Los datos proporcionados a EXPERTOS COMENSALES DE MEXICO, S.A. DE C.V., ser�n resguardados y administrados en t�rminos de lo dispuesto en la Ley y en tal sentido, nos comprometemos a salvaguardar tal informaci�n bajo los principios de lealtad y responsabilidad. Adem�s, la informaci�n obtenida se encuentra protegida por medio de procedimientos f�sicos, tecnol�gicos y administrativos apegados a normas que salvaguardan los datos en t�rminos de lo dispuesto en la Ley.<br/>
Para poder ejercer los derechos de Acceso, Rectificaci�n, Cancelaci�n y Oposici�n o revocar su consentimiento (ARCO), el titular, por s� mismo o mediante un representante legal debidamente acreditado, podr� hacerlo valer mediante el procedimiento indicado en nuestro sitio www.sirloindf.com aviso de privacidad.<br/>
Si usted no est� de acuerdo con la Pol�tica de Privacidad aqu� enunciada, por favor no firme de conformidad, ni utilice los servicios ofrecidos por el mismo.<br/>
La firma el presente documento y/o la utilizaci�n de nuestro producto, indica la aceptaci�n de nuestra pol�tica de Privacidad y Uso de Datos Personales.<br/>
Tambi�n podr�s consultar los t�rminos y condiciones del Programa de Puntos y nuestro Aviso de Privacidad en nuestra p�gina de internet www.sirloindf.com.
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
                        <button style="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h2 class="modal-title page-header text-center"><strong>PREGUNTAS FRECUENTES</strong></h2>
                        <br />                     
                        <p class="text-justify">
                            <strong>1. �Qu� es el Programa VIP?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.<br /> 
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.
                        </p>
                        <p class="text-justify">
                            <strong>2. �En d�nde puedo adquirir la Tarjeta VIP?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.<br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio. 
                        </p>
                        <p class="text-justify">
                            <strong>3. �En d�nde puedo adquirir la Tarjeta VIP?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio. 
                        </p>
                        <p class="text-justify">
                            <strong>4. �C�mo puedo acumular Puntos en mi cuenta?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.
                        </p>
                        <p class="text-justify">
                            <strong>5. Para acumular Puntos �es necesario presentar mi tarjeta al momento de realizar la compra?</strong>
                            <br />
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio. 
                        </p>
                        <p class="text-justify">
                            <strong>6. �C�mo obtengo el Bono de Bienvenida?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.<br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.
                        </p>
                        <p class="text-justify">
                            <strong>7. �Para qu� utilizo mis Puntos?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio. <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.
                        </p>
                        <p class="text-justify">
                            <strong>8. �Cu�nto valen mis Puntos?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.<br />
                            <b>Por ejemplo</b>: 10 Puntos = $10 (diez) pesos.
                        </p>
                        <p class="text-justify">
                            <strong>9. �Puedo cambiar mis Puntos por dinero?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.
                        </p>
                        <p class="text-justify">
                            <strong>10. �Qu� vigencia tiene mi Tarjeta VIP?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.
                        </p>
                        <p class="text-justify">
                            <strong>11. �Qu� debo hacer en caso de Robo o Extrav�o de mi tarjeta?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.<br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.
                        </p>
                        <p class="text-justify">
                            <strong>12.	�C�mo puedo solicitar una Reposici�n de mi tarjeta?</strong>
                            <br />
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum ante ac ipsum condimentum pulvinar. Aliquam facilisis turpis vel massa sagittis, quis ornare risus blandit. In odio eros, maximus quis cursus non, pellentesque non nulla. Aenean non libero vitae ex placerat rutrum ac vel ligula. Donec bibendum lacinia dui eget pharetra. Fusce in ex orci. Nullam ac tristique odio.
                        </p>
                        <p class="text-justify">
                            <strong>13.	�Los Puntos tienen vigencia?</strong>
                            <br />
                            La vigencia de los Puntos es de 12 meses a partir del mes de acumulaci�n.
                        </p>
                        <br />
                        <center><button type="button" class="btn-close" data-dismiss='modal'>Cerrar</button></center>
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h1 class="modal-title page-header text-center"><strong>AVISO DE PRIVACIDAD</strong></h1>
                        <br />
                        <p class="text-justify">
                            Preservar tu privacidad y la seguridad de tu informaci�n personal es importante para nosotros por lo cual estamos comprometidos con la protecci�n de los Datos Personales de nuestros clientes. Cuidamos la privacidad de tus Datos para brindarte la confianza de que tus Datos Personales est�n protegidos. �nicamente las personas autorizadas tendr�n acceso a tus Datos Personales, con el prop�sito de brindarte un mejor servicio por parte de nosotros y as� evitar una divulgaci�n indebida.

Por favor, antes de proporcionarnos tus Datos Personales t�mate un momento para leer el siguiente Aviso de Privacidad. Todos tus Datos Personales ser�n tratados con base en los principios de licitud, consentimiento, informaci�n, responsabilidad y finalidad de conformidad con la Ley Federal de Protecci�n de Datos Personales en Posesi�n de los Particulares, su Reglamento y sus Lineamientos, tus Datos son recabados con la finalidad de brindarte productos o servicios y comunicarte promociones.

Al proporcionarnos tus Datos personales daremos por entendido que est�s de acuerdo con los t�rminos de este Aviso de Privacidad, las finalidades del tratamiento de tus Datos, as� como los medios y procedimiento que ponemos a tu disposici�n para ejercer tus derechos de acceso y rectificaci�n.

CORTES Y BUFETES DE MEXICO S.A. DE C.V. Con domicilio en AV. CANOA 521 DESP. 202, COLONIA TIZAPAN SAN ANGEL, MEXICO D.F. CP 01090 es responsable de recabar sus datos personales, del uso que se le d� a los mismos y de su protecci�n. Por lo anterior,

CORTES Y BUFETES DE M�XICO S.A. DE C.V. ha establecido los siguientes lineamientos para proteger dicha Informaci�n en la medida de lo posible, los cuales pueden cambiar en cualquier momento, por lo que sugerimos consultarlos peri�dicamente. CORTES Y BUFETES DE MEXICO, S.A. DE C.V. solicita informaci�n personal de identidad de los usuarios de nuestros establecimientos, �nicamente de manera voluntaria para poder ver los servicios que ofrece el sitio en los siguientes formularios Los datos personales que requerimos son los siguientes:

Formulario de facturaci�n

� RFC � Calle � Colonia � N�mero exterior/interior � Ciudad � Estado � C.P � Correo de env�o de factura (casilla de mismo correo de registro)

Formulario de env�o

� Casilla en donde se pueda elegir la misma direcci�n de facturaci�n, para que ya no vuelva a llenar la informaci�n (en caso de que no sea la misma direcci�n debe tener los siguientes campos para ser llenados) � Calle � Colonia � N�mero exterior/interior � Ciudad � Estado C.P

Formulario para reservaciones v�a telef�nica o en l�nea

� Sucursal a la que desea acudir � Nombre y Apellido: � Tel�fono: � Fecha � Empresa � Correo electr�nico: � No. De personas � Tipo de comida

Formulario para Bolsa de Trabajo

� Nombre y Apellido: � Correo electr�nico � Edad � Direcci�n � Tel�fono: � Celular � Puesto Solicitado

Formulario para Promociones

� Nombre y Apellido � Correo electr�nico:

La informaci�n capturada es revisada internamente y se utiliza para mejorar en el servicio y env�o de promociones a nuestros clientes, para notificar a nuestros usuarios acerca de actualizaciones y para responder a preguntas hechas por ellos mismos.

Los datos personales recabados tienen tambi�n como finalidad:

a) Dar seguimiento al servicio que se les dio en nuestras instalaciones as� como comentarios o sugerencias. 
b) Darle informaci�n que le permita realizar alguna reservaci�n posterior o servicios adicionales que tenemos.
c) Env�o a trav�s de correo electr�nico de su factura electr�nica. 
d) Evaluar la calidad en el servicio 
e) Env�o de promociones y aviso de lanzamiento de nuevos productos o nuevas sucursales.

NOTA: Las finalidades mencionadas en los incisos a) b) c) d) y e) tienen como objetivo brindarle un mejor servicio y son consideradas necesarias para la prestaci�n del mismo.

Para las finalidades mencionadas en el p�rrafo anterior, usted tiene un plazo de 5 d�as h�biles para manifestar su negativa al tratamiento de su informaci�n personal, enviando la misma al correo electr�nico avisodeprivacidad@sirloindf.com o comunic�ndose al 5616-1645.

NOTA: La informaci�n personal que requerimos no es considerada como sensible de acuerdo con la Ley Federal de Protecci�n de Datos Personales en Posesi�n de Particulares.

Le informamos que no transferimos sus datos personales dentro o fuera del pa�s con personas distintas a las encargadas de dicha informaci�n. Finalidades de dichas transferencias, en t�rminos En caso de que nos veamos obligados o necesitemos transferir su informaci�n personal a terceros nacionales o extranjeros, ser� informado previamente de esta situaci�n a efecto de solicitarle su autorizaci�n e informarle sobre los destinatarios o terceros receptores y finalidades de dichas transferencias, en t�rminos de lo previsto en los art�culos 36 y 37 de la Ley Federal de Protecci�n de Datos Personales en Posesi�n de los Particulares y 68 de su reglamento.

As� mismo nos comprometemos a que estos terceros tendr�n conocimiento del alcance y contenido del aviso de privacidad, haciendo especial �nfasis, en las finalidades a las que usted sujet� el uso y aprovechamiento de su informaci�n personal.

Usted tiene derecho de acceder, rectificar y cancelar sus datos personales, as� como de oponerse al tratamiento de los mismos o revocar el consentimiento que para tal fin nos haya otorgado, a trav�s de los procedimientos que hemos implementado. Para conocer dichos procedimientos, los requisitos, plazos, se pueden poner en contacto con nosotros a trav�s del correo electr�nico avisodeprivacidad@sirloindf.com o al DOMICILIO: AV. CANOA 521 DESP. 202, COLONIA TIZAPAN SAN ANGEL, MEXICO D.F. CP 01090, tel. 5616-1645.

Si usted desea limitar el uso y divulgaci�n de sus datos personales, concretamente, respecto al uso de su informaci�n personal para fines publicitarios o mercadot�cnicos, podr� solicitarlo a trav�s de nuestro departamento administrativo.

CORTES Y BUFETES DE MEXICO, S.A DE C.V. Podr� revelar Informaci�n cuando por mandato de ley y/o de autoridad competente le fuere requerido o por considerar de buena fe que dicha revelaci�n es necesaria para:

I) Cumplir con procesos legales; II) Cumplir con el Convenio del Usuario; III) Responder reclamaciones que involucren cualquier Contenido que menoscabe derechos de terceros o; IV) Proteger los derechos, la propiedad, o la seguridad de Cortes y Bufetes de M�xico, sus Usuarios y el p�blico en general.

ACEPTACI�N DE LA POL�TICA DE PRIVACIDAD

Si usted no est� de acuerdo con la Pol�tica de Privacidad aqu� enunciada, por favor no utilice este sitio ni los servicios ofrecidos por el mismo. El uso de este sitio web por su parte, indica la aceptaci�n de nuestra pol�tica de Privacidad.

LOS DERECHOS ARCO Y REVOCAR EL CONSENTIMIENTO

Para poder ejercer los derechos de Acceso, Rectificaci�n, Cancelaci�n y Oposici�n o revocar su consentimiento, el titular, por si mismo o mediante un representante legal debidamente acreditado, deber� presentar formalmente su solicitud ante el Departamento Administrativo de CORTES Y BUFETES DE MEXICO, S.A DE C.V.

La solicitud para ejercer los Derechos ARCO � revocar el consentimiento debe ser en formato libre y debe venir acompa�ada de la siguiente documentaci�n:

1. Identificaci�n oficial vigente del Titular 
2. En los casos en que el ejercicio de los Derechos ARCO se realice a trav�s del representante legal del Titular, adem�s de la acreditaci�n de la identidad de ambos, se deber� entregar el poder notarial correspondiente o carta poder firmada ante dos testigos o declaraci�n en comparecencia del Titular. 
3. Cuando se quiera ejercer el derecho de rectificaci�n, se tendr� que entregar la documentaci�n que acredite el cambio solicitado de acuerdo a los datos personales a rectificar.

La respuesta a dicha solicitud, as� como el acceso a los datos personales que en su caso se soliciten, ser� por escrito y se entregar� por el Responsable de la Administraci�n y Protecci�n de Datos Personales de los Particulares de CORTES Y BUFETES DE MEXICO S.A. DE C.V. en las instalaciones ubicadas en AV. CANOA 521 DESP. 202, COLONIA TIZAPAN SAN ANGEL, MEXICO D.F. CP 01090 en un plazo de 20 d�as h�biles contados a partir de la fecha en que fue recibida la solicitud, previa acreditaci�n de la identidad del solicitante, o en su caso, de la personalidad de su representante.

El Responsable podr� ampliar �ste plazo hasta por 20 d�as h�biles m�s, cuando el caso lo amerite, con previa notificaci�n de esto al titular.

PROCEDIMIENTO DE AVISO DE ACTUALIZACIONES A NUESTRO AVISO DE PRIVACIDAD

Cualquier modificaci�n o actualizaci�n de nuestro aviso de privacidad o medios para ejercer los derechos ARCO ser�n publicadas

Fecha de actualizaci�n 10/mayo/2013.
                        </p>
                        <br />
                        <center><button type="button" class="btn-close" data-dismiss='modal'>Cerrar</button></center>
                    </div>
                </div>
            </div>
        </div>
		<!-- /AVISO DE PRIVACIDAD -->


		<script type="text/javascript">
//<![CDATA[

theForm.oldSubmit = theForm.submit;
theForm.submit = WebForm_SaveScrollPositionSubmit;

theForm.oldOnSubmit = theForm.onsubmit;
theForm.onsubmit = WebForm_SaveScrollPositionOnSubmit;
//]]>
</script>
	</form>
	<script src="js/vendor/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.js"></script>
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
		src="//www.googleadservices.com/pagead/conversion.js"></script>
	<noscript>
		<div style="display: inline;">
			<img height="1" width="1" style="border-style: none;" alt=""
				src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1029164455/?guid=ON&amp;script=0" />
		</div>
	</noscript>
</body>
</html>
