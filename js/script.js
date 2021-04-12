
const imageUpload= document.getElementById('cStudPhoto');

Promise.all([
  faceapi.nets.faceRecognitionNet.loadFromUri('../face-recog/models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('../face-recog/models'),
  faceapi.nets.ssdMobilenetv1.loadFromUri('../face-recog/models')
]).then(start)

async function start(){
  const container = document.createElement('div')
  // const courseSection = document.getElementsByClassName('course')
  container.style.position='relative'
  document.body.append(container)
  const labeledFaceDescriptors = await loadlabeledImages()
  const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6)
  document.body.append('Loaded')
  imageUpload.addEventListener('change', async()=>{
    const image = await faceapi.bufferToImage(imageUpload.files[0])
    container.append(image)
    const canvas = faceapi.createCanvasFromMedia(image)
    container.append(canvas)
    const displaySize= {width: image.width, height: image.height}
    faceapi.matchDimensions(canvas,displaySize)
    const detections = await faceapi.detectAllFaces(image)
    .withFaceLandmarks().withFaceDescriptors()
    const resizedDetections=faceapi.resizeResults(detections, displaySize)
    const results = resizedDetections.map(d=> faceMatcher.findBestMatch(d.descriptor))
    results.forEach((result, i)=>{
      const box= resizedDetections[i].detection.box
      const drawBox= new faceapi.draw.DrawBox(box, {label: result.toString()})
      drawBox.draw(canvas)
    })
  })
}

function loadlabeledImages(){
  const labels= ['Richard Anatsui','Johnny']
  return Promise.all([
    labels.map(async label=>{
      const descriptions=[]
      for(let i=1; i<=5; i++){
        const img = await faceapi.fetchImage(`https://raw.githubusercontent.com/
        rich5k/smartAttendance/main/
        labelled_images/${label}/${i}.jpeg`)
        const detections= await faceapi.detectSingleFace(img)
        .withFaceLandmarks().withFaceDescriptors()
        descriptions.push(detections.descriptor)
      }

      return new faceapi.LabeledFaceDescriptors(label, descriptions)
    })
  ])
}