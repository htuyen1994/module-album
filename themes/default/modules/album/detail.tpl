<!-- BEGIN: main -->
<div><h3>Danh sách ảnh</h3></div><br>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">

    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">   	
      	<div class="item active">
        	<img src={DATA.image} style="width:100%">
        	<div class="carousel-caption">
        		<h3>{DATA.name}</h3>
        		<p>{DATA.description}</p>
      		</div>
      	</div>
      	<!-- BEGIN: loop -->
      	<div class="item">
        	<img src={DATA.image} style="width:100%">
        	<div class="carousel-caption">
        		<h3>{DATA.name}</h3>
        		<p>{DATA.description}</p>
      		</div>
      	</div>
      	<!-- END: loop -->
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      	<span class="glyphicon glyphicon-chevron-left"></span>
      	<span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      	<span class="glyphicon glyphicon-chevron-right"></span>
      	<span class="sr-only">Next</span>
    </a>
  </div>
<!-- END: main -->
