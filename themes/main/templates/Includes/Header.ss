<% if ClassName != 'Page' %>
<div class="hdr-frame">
	<div class="width--100 align-c">
		<p>This is header</p>
	</div>
</div>
<% end_if %>
<% if ClassName == 'Page' %>
<header class="admin-nav">
	<a href="$BaseHref">
		<% loop HeaderFooter %>
		<div class="hdr-frame__logo">
			<img src="$HeaderLogo.URL" class="img-fit">
		</div>
		<% end_loop %>
	</a>
</header>
<% end_if %>