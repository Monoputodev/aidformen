@extends('Web::layouts.master') 
@section('body') 
<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
?>
<style>
#more {display: none;}
.button {
  background-color: #187bcd; /* black*/
  border: none;
  color: white;
  padding: 6px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:9px;
  margin-left:20px;
}


</style>
<div id="contact" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="section-heading">
					<span>Membership Rules</span>
				</h2>

				<div class="content" style="font-size: 18px; color:black !important;font-family: SolaimanLipi;line-height: 35px;  margin-left:20px">
					ফাউন্ডেশনের সদস্য পদঃ<br>
					সদস্য হওয়ার যোগ্যতাঃ এই ফাউন্ডেশনের সদস্য পদ লাভ করিতে হইলে আঠারো বছর বয়সী বাংলাদেশের যে কোন নাগরিক সংস্থার গঠনতন্ত্রের প্রতি আস্থাবান হইতে হইবে এবং সাদা কাগজে সংস্থার সাধারণ সম্পাদকের মাধ্যমে ভর্তি ফি এবং বার্ষিক চাঁদা প্রদান করিয়া সদস্য পদ লাভ করিবেন এবং নারী-পুরুষ উভয়ই সদস্য হইতে পারবেন। <br>
					১।সদস্যের শ্রেনীবিভাগঃ এই ফাউন্ডেশনের নিম্নরূপ সদস্য থাকিবে। <br>
					<div style="margin-left: 50px;">
						•	প্রতিষ্ঠাতা সদস্য। <br>
						•	জীবন সদস্য। <br>
						•	সাধারণ সদস্য। <br>
						•	দাতা সদস্য <br>
					</div>
					<span id="dots">...</span><span id="more">
					১. প্রতিষ্ঠাতা সদস্যঃ যাহারা প্রাথমিক ভাবে ফাউন্ডেশন স্থাপনে উদ্যোগ গ্রহণ করিয়াছেন তারাই এই ফাউন্ডেশনের প্রতিষ্ঠাতা সদস্য হিসেবে পরিণত হইবে। তাহাদের ভোটাধিকার থাকবে। <br>
					২. আজীবন সদস্যঃ যে কোন গণ্যমান্য ব্যাক্তি এই ফাউন্ডেশনের উন্নয়নে এককালীন নূন্যতম ২০,০০০/- বা তার সমপরিমান সম্পদ দান করিলে তিনি এই ফাউন্ডেশনের আজীবন সদস্যে পরিণত হবে।<br>
					৩. সাধারণ সদস্যঃ যাহারা ভর্তির ফি ১০০/- ও বার্ষিক চাঁদা ৬০০/- প্রদান করিবেন তাহারাই ফাউন্ডেশনের সাধারণ সদস্য হিবে গণ্য হইবেন।<br>
					৪. দাতা সদস্যঃ কার্যনির্বাহী কমিটির সিদ্ধান্ত মোতাবেক যাহারা নির্দিষ্ট পরিমাণ এককালীন চাঁদা প্রদান করিবেন তাহারা ফাউন্ডেশনের দাতা সদস্য রূপে বিবেচিত হইবেন।<br>
					৪. ফাউন্ডেশনের শাখাসমূহঃ
					বর্তমান ফাউন্ডেশনের কার্যকরী পরিষদের অনুমোদন সাপেক্ষে কার্যক্রম প্রসারের জন্য বাংলাদেশের বিভিন্ন স্থানে শাখা অফিস খোলা<br>

					৫. সদস্য হওয়ার নিয়মাবলীঃ<br>
					<div style="margin-left: 50px;">
						•	প্রতিষ্ঠানের নির্দিষ্ট আবেদনপত্রের  মাধ্যমে আবেদন করে নির্ধারিত ভর্তি ফি এবং চাঁদা প্রদান সাপেক্ষে সদস্যপদ লাভ করা যাবে।<br>
						•	সদস্য পদ প্রদানে নির্বাহী সদস্য বা কর্মকর্তাদের সুপারিশের ভিত্তিতে অত্র সংস্থার চেয়ারম্যানের অনুমোদন লাগবে পরিচয় ইস্যুতে ।<br>
						•	সদস্য সংখ্যাঃ- এই প্রতিষ্ঠানের সদস্য সংখ্যা সীমাবদ্ধ নয়, তবে প্রয়োজনমতো বা সংস্থার স্বার্থে নির্বাহী কমিটির সিদ্ধান্তক্রমে সীমিত সংখ্যা ঘোষনা করা যাইবে।<br>
					</div>
					৬. সদস্য পদ বাতিলঃ <br>
					<div style="margin-left: 50px;">
						•	ধারাবাহিকভাবে তিনটি অধিবেশনে যোগদান না করলে।<br>
						•	রাষ্ট্রবিরোধী কোন কার্যক্রমে জড়ালে।<br>
						•	প্রতিষ্ঠানের গনতন্ত্র বিরোধী কাজ করলে।<br>
						•	দুর্নীতি কার্যকলআপে জড়িত থাকলে<br>
					</div>

					৭.সাংগঠনিক কাঠামোঃ<br>
					এই ফাউন্ডেশনের কার্যক্রম পরিচালনার জন্য নিম্ন বর্ণিত পরিষদ থাকিবে। <br>
					যথাঃ <br>
					১. সাধারন পরিষদ <br>২. কার্যকরী পরিষদ <br>৩. উপদেষ্টা পরিষদ <br>

					১.সাধারন পরিষদঃ<br>
					<div style="margin-left: 50px;">
						•	সাধারন পরিষদ গঠন ও কাঠামোঃ সংস্থার সাধারণ সদস্য ও আজীবন সদস্য নিয়ে সাধারন পরিষদ গঠিত হইবে।<br>
						•	এই পরিষদ সংস্থার সর্বোচ্চ পরিষদ বলে গণ্য হবে ।<br>
						•	এই পরিষদ কার্যকরী পরিষদ গঠন করবে।<br>
						•	সংস্থা, পরিকল্পনা , বাজেট আয়-ব্যায়ের হিসাব ,বার্ষিক প্রতিবেদন প্রভৃতি অনুমোদন এবং গঠনতন্ত্রের সংশোধন, সংস্থা বিলুপ্তির প্রস্তাব বিবেচনা ও অনুমোদন করবেন।<br>
						•	সাধারন সদস্যদের তলবি  সভা আহবান করার ক্ষমতা থাকবে।<br>
					</div>
					২.কার্যনির্বাহী পরিষদঃ<br>
					<div style="margin-left: 50px;">
						•	সংস্থা পরিচালনা করার জন্য একটি নির্বাচিত কার্যনির্বাহী পরিষদ থাকবে।<br>
						•	এই পরিষদের মেয়াদ হবে ৩(তিন) বছর। সাধারণ পরিষদের কর্তৃক  নির্বাচনের মাধ্যমে কার্যনির্বাহী পরিষদ গঠিত হবে।<br>
						•	এই পরিষদ সংস্থার পরিচালনার দায়িত্বে থাকবে।<br>
						•	পরিকল্পনা তৈরী ও বাস্তবায়ন , বাজেট প্রনয়ন , সংস্থার আয়-ব্যায়ের এর হিসাব যথাযথ ভাবে সংরক্ষন , কার্যক্রমের উপর বার্ষিক প্রতিবেদন প্রনয়ন কর্মসূচী প্রকল্প প্রনয়ন করবে এবং সাধারন পরিষদ হতে চূড়ান্ত অনুমোদন গ্রহন করবে।<br>
					</div>

					৩. উপদেষ্টা পরিষদঃ<br>
					•	সংস্থা পরিচালনা করার জন্য একটি নির্বাচিত পরিষদ থাকবে।<br>
					•	এই পরিষদের মেয়াদ কার্যনির্বাহী পরিষদের সিদ্ধান্তক্রমে নির্ধারণ করা হবে। উপদেষ্টা পরিষদ কার্যনির্বাহী  পরিষদের সিদ্ধান্তক্রমে ফাউন্ডেশনের নীতিনির্ধারনী ভূমিকা পালন করবেন।<br>
                     </span></p>
				</div>
			</div>
                   <button class="button" onclick="myFunction()" id="myBtn" >Read more</button>

			<div class="col-md-12">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin-left:0px;margin-top: 10px;">
					<li class="nav-item">
						<a class="nav-link active btn-info btn-mini" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Online Membership Form</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn-success btn-mini" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Generel Membership Form</a>
					</li>
					
				</ul>


				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						@include('Web::form.onlinemember')
					</div>
					<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
						<p><a href="{{URL::to('logo/Member-form.pdf')}}" class="btn btn-success btn-sm" download=""><i class="fa fa-download"></i> Download</a></p>
						<iframe
						src="{{URL::to('logo/Member-form.pdf')}}?embedded=true&url=http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&scrollbar=0"
						frameBorder="0"
						scrolling="auto"
						height="700px"
						width="100%"
						></iframe>
<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</div>

@endsection