import utils from './utils';
import './progressTimer'
import $ from 'jquery';

'use strict'

let log = console.log.bind(console),
  id = val => document.getElementById(val),
  ul = id('ul'),
  gUMbtn = id('gUMbtn'),
  start = id('start'),
  stop = id('stop'),
  stream,
  recorder,
  counter=1, 
  chunks,
  media;

let currentUrl = utils.getUrl()
if (currentUrl.includes('post-story')){

  id('audio-button').onclick = e => {
    gUMbtn.click() 
  }

  gUMbtn.onclick = e => {
    let mv = id('mediaVideo'),
        mediaOptions = {
          video: {
            tag: 'video',
            type: 'video/webm',
            ext: '.mp4',
            gUM: {video: true, audio: true}
          },
          audio: {
            tag: 'audio',
            type: 'audio/mp3',
            ext: '.mp3',
            gUM: {audio: true}
          }
        };
    media = mv.checked ? mediaOptions.video : mediaOptions.audio;
    navigator.mediaDevices.getUserMedia(media.gUM).then(_stream => {
      stream = _stream;
      id('gUMArea').style.display = 'none';
      id('btns').style.display = 'inherit';
      start.removeAttribute('disabled');
      recorder = new MediaRecorder(stream);
      recorder.ondataavailable = e => {
        chunks.push(e.data);
        if(recorder.state == 'inactive')  makeLink();
      };
      log('got media');
    }).catch(log);
  }

  start.onclick = e => {
    start.disabled = true;
    stop.removeAttribute('disabled');
    chunks=[];
    recorder.start();
    $('#progress-timer').progressTimer({
        timeLimit: 300,
        warningThreshold: 250,
        baseStyle: 'progress-bar-warning',
        warningStyle: 'progress-bar-danger',
        completeStyle: 'progress-bar-info',
        onFinish: function() {
            // console.log("I'm done");
            stop.click()
        }
    })
  }


  stop.onclick = e => {
    stop.disabled = true;
    recorder.stop();
    start.removeAttribute('disabled');
    $('.progress').remove()
  }

}

function makeLink(){
  let blob = new Blob(chunks, {type: media.type })
    , url = URL.createObjectURL(blob)
    , li = document.createElement('div')
    , mt = document.createElement(media.tag)
    , hf = document.createElement('a')
  ;
  let guid = utils.guid();
  mt.controls = true;
  mt.src = url;
  // hf.href = url;
  // hf.download = `${guid}${media.ext}`;
  hf.innerHTML = `Save file`;
  hf.id = 'audio-file';
  hf.classList.add('btn');
  hf.classList.add('edit-button');
  li.appendChild(mt);
  li.appendChild(hf);
  ul.appendChild(li);

  console.log('make download button')

  let data = new FormData()
  // data.append('action','process')
  data.append('filename', hf.download)
  data.append('file',blob)

  id('audio-file').addEventListener('click', ()=> {

    console.log('click works')

    $.ajax({
        url :  "php/audio-processor.php",
        type: 'POST',
        data: data,
        contentType: false,
        processData: false,
        success: function(data) {
          utils.savedAudio(data)
          // alert(data)
        },    
        error: function(error) {
          alert('error: ' + error);
        }
      })
  })

  id('audio-file').click()

}

