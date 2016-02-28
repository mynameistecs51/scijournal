<?php echo $header;?>
<style type="text/css">
	.show_abstract{
		display: none;
		word-wrap:break-word;
		width: 700px;
	}
</style>
<script type="text/javascript" charset="utf-8" >
	$(function () {
		$('.show_abstract').length();
		$('.abstract').click(function(){
			if($('.show_abstract').is(':hidden')){
				$(this).slideDown('slow');
			}else{
				$(this).hide();
			}

		});
	}); //end function start jquery -->
</script>
<div class="row">       <!-- //    show paper all    //  -->
	<div class="col-sm-12">
		<div class="nev_url"><?php echo "Page -",$NAV; ?> </div>
		<hr/>
		<p class="">
			<?php ?>
			Welcome to udon thani rajabhat university Journal of Science, an international journal for the publication of all preliminary communications in Science.
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
						<th class="col-sm-1">number</th>
						<th class="text-center col-sm-12">details</th>
					</thead>
					<tbody>
						<?php $num = 0;?>
						<?php foreach ($getjournal['result'] as $rowJournal): ?>
							<?php $number= $num+=1;?>
							<tr>
								<td><?php echo $number;?></td>
								<td class="col-sm-12">
									<?php
									echo "<span class='text-primary'><b>",$rowJournal->uld_title,"</b></span>","<br/>";
									echo "Author :",$rowJournal->uld_author,"<br/>";
									echo "E-mail :",$rowJournal->uld_email,"<br/>";
									echo "<i class=\"glyphicon glyphicon-search\" aria-hidden=\"true\">FullText</i>|<i class=\"glyphicon glyphicon-search abstract\" aria-hidden=\"true\">Abstract</i>";
									echo "<div class='show_abstract well ' id='show_abstract".$number."'>".$rowJournal->uld_abstract."</div>";
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