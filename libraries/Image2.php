<?php
# Classes are defined with the keyword "class"
class Image {

    /*
    Class properties
    Encapsulation:
    Access modifiers indicate what access levels other classes can have to these properties
    1) Public    - Any other class can access the property
    2) Private   - Only this class can access the property
    3) Protected - This class and any class that inherits it can access this property
    */
    protected $image;
    protected $width;
    protected $height;
    protected $mimetype;

    /* 
    Constructor
    __construct is a Magic method (optional), called whenever an object is instantiated
    Magic methods are reserved methods built into PHP, and prefixed with two underscores
    */
    public function __construct($filename) {

        # Read the image file to a binary buffer
        $fp  = fopen($filename, 'rb') or die("Image '$filename' not found!");
        $buf = '';
        while(!feof($fp))
            $buf .= fgets($fp, 4096);

        /*
        Create image and asign it to the image property
        $this is a built in variable that points to the current object. 
        It's used to access properties and methods of the current class.
        */
        $this->image = imagecreatefromstring($buf);

        # Extract image information storing in the class attributes
        $info           = getimagesize($filename);
        $this->width    = $info[0];
        $this->height   = $info[1];
        $this->mimetype = $info['mime'];
    }

    public function display() {
        header("Content-type: {$this->mimetype}");
        switch($this->mimetype) {
            case 'image/jpeg': imagejpeg($this->image); break;
            case 'image/png': imagepng($this->image); break;
            case 'image/gif': imagegif($this->image); break;
        }
    }

    public function resize($width, $height) {
        $thumb = imagecreatetruecolor($width, $height);
        imagecopyresampled($thumb, $this->image, 0, 0, 0, 0, $width, $height, $this->width, $this->height);
        $this->image = $thumb;
    }

} # eoc

?>		return array('optimal_width' => $optimal_width, 'optimal_height' => $optimal_height);
	}


	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function get_size_by_fixed_height($new_height) {
		$ratio    = $this->width / $this->height;
		$new_width = $new_height * $ratio;
		return $new_width;
	}


	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function get_size_by_fixed_width($new_width) {
		$ratio = $this->height / $this->width;
		$new_height = $new_width * $ratio;
		return $new_height;
	}


	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function get_size_by_auto($new_width, $new_height) {
	
		# Image to be resized is wider (landscape)
		if ($this->height < $this->width) {
			$optimal_width = $new_width;
			$optimal_height= $this->get_size_by_fixed_width($new_width);
		}
		# Image to be resized is taller (portrait)
		elseif ($this->height > $this->width) {
			$optimal_width = $this->get_size_by_fixed_height($new_height);
			$optimal_height= $new_height;
		}
		# Image to be resized is a square
		else {
			if ($new_height < $new_width) {
				$optimal_width  = $new_width;
				$optimal_height = $this->get_size_by_fixed_width($new_width);
			} else if ($new_height > $new_width) {
				$optimal_width  = $this->get_size_by_fixed_height($new_height);
				$optimal_height = $new_height;
			} else {
				# Sqaure being resized to a square
				$optimal_width = $new_width;
				$optimal_height= $new_height;
			}
		}

		return array('optimal_width' => $optimal_width, 'optimal_height' => $optimal_height);
	}


	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function get_optimal_crop($new_width, $new_height) {

		$heightRatio = $this->height / $new_height;
		$widthRatio  = $this->width /  $new_width;

		if ($heightRatio < $widthRatio) {
			$optimalRatio = $heightRatio;
		} else {
			$optimalRatio = $widthRatio;
		}

		$optimal_height = $this->height / $optimalRatio;
		$optimal_width  = $this->width  / $optimalRatio;

		return array('optimal_width' => $optimal_width, 'optimal_height' => $optimal_height);
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function crop($optimal_width, $optimal_height, $new_width, $new_height) {
		
		# Find center - this will be used for the crop
		$cropStartX = ( $optimal_width / 2) - ( $new_width /2 );
		$cropStartY = ( $optimal_height/ 2) - ( $new_height/2 );

		$crop = $this->image_resized;
		//imagedestroy($this->image_resized);

		# Now crop from center to exact requested size
		$this->image_resized = imagecreatetruecolor($new_width , $new_height);
		imagecopyresampled($this->image_resized, $crop , 0, 0, $cropStartX, $cropStartY, $new_width, $new_height , $new_width, $new_height);
	}


	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function save_image($save_path, $image_quality="100") {
		
		# Get extension
		$extension = strrchr($save_path, '.');
		$extension = strtolower($extension);

		switch($extension) {
			case '.jpg':
			case '.jpeg':
				if (imagetypes() & IMG_JPG) {
					imagejpeg($this->image_resized, $save_path, $image_quality);
				}
				break;

			case '.gif':
				if (imagetypes() & IMG_GIF) {
					imagegif($this->image_resized, $save_path);
				}
				break;

			case '.png':
				# Scale quality from 0-100 to 0-9
				$scaleQuality = round(($image_quality/100) * 9);

				# Invert quality setting as 0 is best, not 9
				$invertScaleQuality = 9 - $scaleQuality;

				if (imagetypes() & IMG_PNG) {
					 imagepng($this->image_resized, $save_path, $invertScaleQuality);
				}
				break;

			// ... etc

			default:
				# No extension - No save.
				break;
		}

		imagedestroy($this->image_resized);
	}



	/*-------------------------------------------------------------------------------------------------	
	$imgObj = new Image(APP_PATH."uploads/test.png");	
	echo $imgObj->exists();
	
	If you wanted it to return the place holder
	echo $imgObj->exists(TRUE);
	-------------------------------------------------------------------------------------------------*/
	public function exists($return_placeholder = FALSE) {
	
		# See if we can get any info about this image
		$image = @getimagesize($this->file_name);
					
		# Does not exist
		if(!is_array($image)) {
			
			if($return_placeholder == FALSE) 
				return false;
			else 
				return PLACE_HOLDER_IMAGE; 
		} 
		# Exists
		else {
			return $this->file_name;
		}
	}  
   
   
	/*-------------------------------------------------------------------------------------------------
	Checkerboard is created by creating a smaller image of random 1x1 pixels then scaling it up.
	pixel_w and pixel_h determine how many checkboxes there are. 
	So if you use a smaller pixel_w/h, when you zoom in the checkboxes are bigger.
	-------------------------------------------------------------------------------------------------*/
	public function generate_random_image($width = 200, $height = 200, $checkered = FALSE, $pixel_w = 8, $pixel_h = 8) {
				
		# Setup
			$canvas = imagecreatetruecolor($pixel_w, $pixel_h);	
			$color = $this->generate_random_color($canvas);	
					
		# Create image
			
			# Every row
			for($row = 1; $row <= $pixel_h; $row++) {

				# Every pixel in that row
				for($column = 1; $column <= $pixel_w; $column++) {	

					# If we're making a checkered image, generate a different color
					if($checkered) $color = $this->generate_random_color($canvas);
												
					# Set this pixel	
					imagesetpixel($canvas, $column - 1 , $row - 1, $color);
					
				}
			}
				
		# Create a png image from our canvas
			imagepng($canvas, $this->file_name);
			
		# Update our class variable image to hold this new image		
			$this->image = $this->open_image($this->file_name);

		# Now resize and save		
			$this->resize($width, $height);
			$this->save_image($this->file_name, 100);
	
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
    
    -------------------------------------------------------------------------------------------------*/
	public function generate_random_color($canvas) {
	
		$color_options = Array("#6f0247", "#FF0569", "#FFF478", "#BAFFC0", "#27DB2D", "#380470", "#9D69D6");
		$random_number = rand(0,sizeof($color_options) - 1);
		$random_color  = $color_options[$random_number];	
		$rgb   		   = $this->hex2rgb($random_color);
		$color 		   = imagecolorallocate($canvas, $rgb[0] , $rgb[1], $rgb[2]);

		return $color;
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function hex2rgb($color) {
	    if ($color[0] == '#')
	        $color = substr($color, 1);
	
	    if (strlen($color) == 6)
	        list($r, $g, $b) = array($color[0].$color[1],
	                                 $color[2].$color[3],
	                                 $color[4].$color[5]);
	    elseif (strlen($color) == 3)
	        list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
	    else
	        return false;
	
	    $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
	
	    return array($r, $g, $b);
	}

 
} // eoc
?>