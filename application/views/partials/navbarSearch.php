<!-- views/partials/navbarSearch.ejs -->
<div style="float:left;margin-top:74px;margin-left:20px">
	<ul class="nav navbar-nav">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size:16px;color:#FEF1F3;font-weight:bold">Sort by <%=viewTypeLabel%> <span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
				<ul>
					<li><a href="/searchAction?searchBar=<%=searchValue%>&page=1&viewType=mostviewed" class="dropdown-toggle" role="button" aria-expanded="false" style="font-size:14px;color:#333;font-weight:bold">Most viewed</a></li>
					<li><a href="/searchAction?searchBar=<%=searchValue%>&page=1&viewType=rating" class="dropdown-toggle" role="button" aria-expanded="false" style="font-size:14px;color:#333;font-weight:bold">Top rated</a></li>
					<li><a href="/searchAction?searchBar=<%=searchValue%>&page=1&viewType=newest" class="dropdown-toggle" role="button" aria-expanded="false" style="font-size:14px;color:#333;font-weight:bold">Newest</a></li>
				</ul>
		  </ul>
		</li>
	</ul>
</div>