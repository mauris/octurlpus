#Octurlpus

Making URLs meaningful to code

[![Build Status](https://secure.travis-ci.org/mauris/octurlpus.png?branch=master)](http://travis-ci.org/mauris/octurlpus)

##Intro

Octurlpus helps you to convert URLs into meaningful data that you can use to integrate services into your PHP application.

##Demo

Having a YouTube URL that your user has given your application would mean that you need to parse the URL and fetch the data from YouTube via YouTube's API. However with Octurlpus:

    $octurlpus = new Octurlpus();
    $data = $octurlpus->request('http://www.youtube.com/watch?v=iDpMnzRna6Y&feature=plcp');

You will be able to get the data about the YouTube video as:

    {
      "provider_url":"http:\/\/www.youtube.com\/",
      "thumbnail_url":"http:\/\/i2.ytimg.com\/vi\/iDpMnzRna6Y\/hqdefault.jpg",
      "title":"How-to: Installing Packfire Framework for PHP on Windows via CLI",
      "html":"\u003ciframe width=\"480\" height=\"270\" src=\"http:\/\/www.youtube.com\/embed\/iDpMnzRna6Y?fs=1\u0026feature=oembed\" frameborder=\"0\" allowfullscreen\u003e\u003c\/iframe\u003e",
      "author_name":"Packfire Framework",
      "height":270,
      "thumbnail_width":480,
      "width":480,
      "version":"1.0",
      "author_url":"http:\/\/www.youtube.com\/channel\/UCu0KZBrcqqRLG-2im1gf6qg",
      "provider_name":"YouTube",
      "type":"video",
      "thumbnail_height":360
    }
    
With the data, you can easily integrate videos, links, embeds, photos into your application. 
    
##oEmbed

oEmbed is a open embedding standard that allows consumers to get data about a URL and to integrate these data seamlessly into their applications.

Some of the providers in Octurlpus use oEmbed to retrieve the data from the providers' services by implementing the standard.

Learn more about oEmbed at: http://oembed.com/

##License

Octurlpus is released open source under the New BSD License. 