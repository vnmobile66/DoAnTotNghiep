let voiceButton = document.querySelector('#voice_search');

var message = document.querySelector('#search-text');

var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;

var grammar = '#JSGF V1.0;'

var recognition = new SpeechRecognition();
var speechRecognitionList = new SpeechGrammarList();
speechRecognitionList.addFromString(grammar, 1);
recognition.grammars = speechRecognitionList;
recognition.lang = 'vi-VN';
recognition.interimResults = false;

recognition.onresult = function(event) {
    var lastResult = event.results.length - 1;
    var content = event.results[lastResult][0].transcript;
    message.value = content;
};

recognition.onspeechend = function() {
    recognition.stop();
};

recognition.onerror = function(event) {
    message.value = 'Lỗi: ' + event.error;
}

voiceButton.addEventListener('click', () => {
    recognition.start();
});
