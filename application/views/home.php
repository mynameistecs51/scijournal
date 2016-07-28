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
		<p class="">
			<?php ?>
<<<<<<< HEAD
<<<<<<< HEAD
			Welcome  to udon thani rajabhat university Journal of Science, an international journal for the publication of all preliminary communications in Science.
=======
			Welcome  aaaa to udon thani rajabhat university Journal of Science, an international journal for the publication of all preliminary communications in Science.
>>>>>>> 466c0c97f72f7d93224a01400bfabd40ba3d45e7
=======
			Welcome  aaaa to udon thani rajabhat university Journal of Science, an international journal for the publication of all preliminary communications in Science.
>>>>>>> refs/remotes/origin/master
			<br/><br/>
			First launched in 1973 by Faculty of Science, udon thani rajabhat university, CMJS is peer-reviewed and published as hardcopy and online open-access journal. It is indexed/abstracted in :
			<br/><br/>
			• Science Citation Index Expanded (SciResearch®)<br/>
			• Journal Citation Reports/Science Edition<br/>
			• SCOPUS<br/>
			• SciFinder - Chemical Abatracts Service<br/>
			• BIOSIS Previews<br/>
			• Google Scholar.
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