<!-- minicskeleton front controller template -->
{if $mostrar}
<div class="row ApRow has-bg bg-boxed" data-bg=" no-repeat" style="background: no-repeat;padding-top: 50px;padding-bottom: 20px;">
	<div class="aboutus col-lg-3 col-md-5 col-sm-6 col-xs-12 col-sp-12 ApColumn ">
		<div class="ApRawHtml block">
			<div class="block_content"> 
				{$c1f1}
				{$c1f2}
				{$c1f3}
				{$c1f4}
				{$c1f5}
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-2 col-sm-6 col-xs-12 col-sp-12 ApColumn ">
		<div class="ApRawHtml block">
			<div class="block_content">
				<div> 
					{$c2f1}
					{$c2f2}
					{$c2f3}
					{$c2f4}
					{$c2f5}
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-2 col-sm-6 col-xs-12 col-sp-12 ApColumn ">
		<div class="ApHtml block">
			<div class="block_content">
				{$c3f1}
				{$c3f2}
				{$c3f3}
				{$c3f4}
				{$c3f5}
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-2 col-sm-6 col-xs-12 col-sp-12 ApColumn ">
		<div class="ApHtml block">
			<div class="block_content">
				{$c4f1}
				{$c4f2}
				{$c4f3}
				{$c4f4}
				{$c4f5}
			</div>
		</div>
	</div>
</div>
{else}
	<script>
		document.getElementById('footerenlaces').style.display = 'none';
	</script>
{/if}
<!-- end minicskeleton front controller template -->