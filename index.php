<?php
include_once 'header.php';
include_once 'side.php';
include_once 'includes/functions.php';
?>
<section id="content" class="col-md-8">
	<div class="row">
		<textarea class="commentBox" placeholder="Place your comments here" type="textarea"></textarea>
		<p><span class="counter">140</span> Characters left</p>
		<button>Post</button>
		<ul class="clearfix comments">
			<li>I left a comment...</li>
			<li>I left another comment...</li>
		</ul>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
			$('button').click(function () {
				var comment = $('.commentBox').val();
				$('<li>').text(comment).prependTo('.comments');
				$('button').attr('disabled', 'true');
				$('.counter').text('140');
				$('.commentBox').val('');
			});

			$('.commentBox').keyup(function () {
				var commentLength = $(this).val().length;
				var charLeft = 140 - commentLength;
				$('.counter').text(charLeft);

				if (commentLength == 0) {
					$('button').attr('disabled', 'true');
				}
				else if (commentLength > 140) {
					$('button').attr('disabled', 'true');
				}
				else {
					$('button').removeAttr('disabled', 'true');
				}
			});

			$('button').attr('disabled', 'true');

		});
	</script>
</section>
<?php
include_once 'footer.php';
?>