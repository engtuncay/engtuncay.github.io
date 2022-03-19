

# 

CSS The object-fit Property

The CSS object-fit property is used to specify how an <img> or <video> should be resized to fit its container.

 Browser Support 
object-fit	31.0	16.0	36.0	7.1	19.0

The CSS object-fit Property

The CSS object-fit property is used to specify how an <img> or <video> should be resized to fit its container.

This property tells the content to fill the container in a variety of ways; such as "preserve that aspect ratio" or "stretch up and take up as much space as possible".

Look at the following image from Paris, which is 400x300 pixels:

However, if we style the image above to be 200x400 pixels, it will look like this:

Example
img {
  width: 200px;
  height: 400px;
}

We see that the image is being squeezed to fit the container of 200x400 pixels, and its original aspect ratio is destroyed.

If we use object-fit: cover; it will cut off the sides of the image, preserving the aspect ratio, and also filling in the space, like this:

Example
img {
  width: 200px;
  height: 400px;
  object-fit: cover;
}

Another Example
Here we have two images and we want them to fill the width of 50% of the browser window and 100% of the height.

In the following example we do NOT use object-fit, so when we resize the browser window, the aspect ratio of the images will be destroyed:

Example

In the next example, we use object-fit: cover;, so when we resize the browser window, the aspect ratio of the images is preserved:

All Values of The CSS object-fit Property
The object-fit property can have the following values:

fill - This is default. The replaced content is sized to fill the element's content box. If necessary, the object will be stretched or squished to fit
contain - The replaced content is scaled to maintain its aspect ratio while fitting within the element's content box
cover - The replaced content is sized to maintain its aspect ratio while filling the element's entire content box. The object will be clipped to fit
none - The replaced content is not resized
scale-down - The content is sized as if none or contain were specified (would result in a smaller concrete object size)

The following example demonstrates all the possible values of the object-fit property:

Example
.fill {object-fit: fill;}
.contain {object-fit: contain;}
.cover {object-fit: cover;}
.scale-down {object-fit: scale-down;}
.none {object-fit: none;}


# Rounded Corners

https://www.w3schools.com/css/css3_borders.asp


