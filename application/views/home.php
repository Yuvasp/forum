<!doctype html>
<html>
<head>
	<title>Simple Forum - Yuvasp.xyz</title>
	<meta name="keywords" content="yuva, forum, insider">
	<meta name="description" content="Simple forum to upload image.">
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet" />
</head>
<body>
    <h1>Image Forum</h1>
    <h3><?php echo $this->session->flashdata('item'); ?></h3>
	<table class="top">
    <tr>
      <td>
        Posts: <?php echo $uploadCount; ?>
      </td>
      <td>
		<a href=<?php echo base_url()?>index.php/home/export>Export</a>
      </td>
      <td>
        Views: <?php echo $viewCount; ?>
      </td>
    </tr>
    </table>
    <br />
    <table class="middle">
    <tr>
    <center>
		<?php echo form_open_multipart('home/index');?>
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="" />

			<?php echo "<input type='file' name='userfile' size='20' />"; ?>
			<?php echo "<input type='submit' name='submit' value='upload' /> ";?>
		<?php echo "</form>"?>
	</form>
    </center>
    </tr>
    </table>
    <?php
		if (isset($files) && count($files)) {
	?>
		<table class="bot1">
			<?php
				foreach ($files as $file) {
			?>
					<tr>
						<center>
						 <label><?php echo $file->title?><br></label>
						 <img src='<?php echo base_url()?>uploadimage/<?php echo $file->filename?>'>
						 </center>
					</tr>
			<?php
				}
			?>
		</table>
    <?php
		}
	?>
<br />
    <p>Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</body>
</html>