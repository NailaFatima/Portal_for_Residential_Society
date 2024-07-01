<?php
include_once 'header.php';
include_once 'side.php';
include_once 'includes/functions.php';
?>
<section id="content" class="col-md-8">
	<div class="row">
		<div class="warning" id="no_go"></div>
		<div class="commentbox-app">
			<div class="container">
				<h1 class="heading">commentbox</h1>
				<div class="clearfix">
					<form id="comment-form">
						<input type="text" id="comment-input" class="comment-input" placeholder="Thoughts">
						<input type="submit" value="Post" class="comment-btn">
					</form>
				</div>

				<ul id="comment-stream" class="comment-stream">
					dummy data: <li>Hey! <span class="comment-remove">&times;</span></li>
					<li>Just a thought <span href="" class="comment-remove">&times;</span></li>
				</ul>
				<button class="remove-all-btn" id="remove-all" type="button">Remove all</button>
			</div>
		</div>
</section>
</div>