<!-- views/partials/navbar.ejs -->
<div style="float:left;margin-top:74px;margin-left:20px">
	<ul class="nav navbar-nav">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size:16px;color:#FEF1F3;font-weight:bold">Sort by <%=viewTypeLabel%> <span class="caret"></span></a>
		  <ul class="dropdown-menu" role="menu">
				<ul>
					<li><a href="/category/<%=categoryName%>/mostviewed/1" class="dropdown-toggle" role="button" aria-expanded="false" style="font-size:14px;color:#333;font-weight:bold">Most viewed</a></li>
					<li><a href="/category/<%=categoryName%>/rating/1" class="dropdown-toggle" role="button" aria-expanded="false" style="font-size:14px;color:#333;font-weight:bold">Top rated</a></li>
					<li><a href="/category/<%=categoryName%>/newest/1" class="dropdown-toggle" role="button" aria-expanded="false" style="font-size:14px;color:#333;font-weight:bold">Newest</a></li>
				</ul>
		  </ul>
		</li>
	</ul>
</div>