<!doctype html>
<html lang="en">
<head>
  <title>WebGL Globe</title>
  <meta charset="utf-8">
  <style type="text/css">
    html {
      height: 100%;
    }

    body {
      margin: 0;
      padding: 0;
      background: #000000 url(/globe/loading.gif) center center no-repeat;
      color: #ffffff;
      font-family: sans-serif;
      font-size: 13px;
      line-height: 20px;
      height: 100%;
    }





    h1 {
        text-align: center;
        font-size: 200px;
        font-family: Helvetica Neue;
        font-weight: 100;
    }

    p.lead {
      text-align: center;
    }
    p.lead a {


      font-family: Helvetica Neue;
      color: white;
      text-decoration: none;
      font-size: 40px;
    
      font-weight: 100;
    }

    header {
      position: absolute;
      bottom: 400px;
      width: 100%;
    }


  </style>
</head>
<body>

<div id="container"></div>

<header>
  <h1>Studs 2017</h1>
  <p class=lead><a href="ansokan">ANSÖK HÄR</a></p>
</header>


<script type="text/javascript" src="globe/third-party/Detector.js"></script>
<script type="text/javascript" src="globe/third-party/three.min.js"></script>
<script type="text/javascript" src="globe/globe.js"></script>
<script type="text/javascript">

  var globe = DAT.Globe(document.getElementById('container'), {
    colorFn: function(label) {
       return new THREE.Color(0xe83d84);/*new THREE.Color([
         0xd9d9d9, 0xb6b4b5, 0x9966cc, 0x15adff, 0x3e66a3,
         0x216288, 0xff7e7e, 0xff1f13, 0xc0120b, 0x5a1301, 0xffcc02,
         0xedb113, 0x9fce66, 0x0c9a39,
         0xfe9872, 0x7f3f98, 0xf26522, 0x2bb673, 0xd7df23,
         0xe6b23a, 0x7ed3f7][label]);*/
    }
  });

  globe.rotationSpeed.x = 0.002;

  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'search.json', true);
  xhr.onreadystatechange = function(e) {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var data = JSON.parse(xhr.responseText);
        window.data = data;
        globe.addData(data, {format: 'legend'});
        globe.createPoints();
        globe.animate();
        document.body.style.backgroundImage = 'none'; // remove loading
      }
    }
  };
  xhr.send(null);

</script>


</body>

</html>
