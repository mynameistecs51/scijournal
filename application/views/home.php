<?php echo $header;?>
<style type="text/css">
	.show_abstract{
		display: none;
		word-wrap:break-word;
		width: 700px;
	}
</style>
<script type="text/javascript" charset="utf-8" >
	$(function(){
		count_abstract();
		show_abstract();
	});
	function count_abstract() {
		var nums = $('.abstract').length;
		for (i=1;i<=nums;i++){
			show_abstract(i);
		}
	}
	function show_abstract(num) {
		$('#abstract'+num).click(function(){
			if($('#show_abstract'+num).is(':hidden')){
				$('#show_abstract'+num).slideDown('slow');
			}else{
				$('#show_abstract'+num).hide('slow');
			}
		});
}//end function start jquery -->
</script>
<div class="row">       <!-- //    show paper all    //  -->
	<div class="col-sm-12">
		<div class="nev_url"><div class="pull-left"><?php echo "Page -",$NAV; ?> </div><div class="pull-right"><?php echo $name;?></div></div>
		<hr/>
		<p style="text-indent:1cm; text-align:justify;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The South East Asian Journal of Science (SEAJ Science) is an international journal for the publication of original research results covering all aspects of the basic and applied sciences, including mathematics, IT and computer science, public health and sport science.<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			The SEAJ Science is peer-reviewed and published in hardcopy and online forms as an open-access journal. 
			<br>
			<br>
			Print ISSN: xxx-xxx
			<br>
			eISSN: xxxx-xxxx
			<br>
			Frequency: 2 issues/year

		</p>
	</div>
	<div class="col-sm-12">
		<div class="panel panel-primary">
			<div class ="panel-heading">
				<div class ="panel-title">All journal </div>
			</div>
			<div class ="panel-body">
				<table id ="" class="display" cellspacing="0" width="100%">
					<thead>
						<th class="col-sm-1">#</th>
						<th class="text-center col-sm-12">DETAIL</th>
					</thead>
					<tbody>
						<?php $num = 0;?>
						<?php foreach ($getjournal['result'] as $rowJournal): ?>
							<?php $number= $num+=1;?>
							<tr>
								<td><?php echo $number;?></td>
								<td class="col-sm-12">
									<?php
									echo "<span class='text-primary'><b>",$rowJournal->j_title,"</b></span>","<br/>";
									echo "Author :",$rowJournal->j_author,"<br/>";
									echo "Type :",$rowJournal->cat_name,"<br/>";
									echo "E-mail :",$rowJournal->j_email,"<br/>";
									echo "<i class=\"glyphicon glyphicon-search\" aria-hidden=\"true\">FullText</i>|<i class=\"glyphicon glyphicon-search abstract\" id='abstract".$number."' aria-hidden=\"true\">Abstract</i>";
									echo "<div class='show_abstract well ' id='show_abstract".$number."' >".$rowJournal->j_abstract."</div>";
									?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php echo $footer;?>