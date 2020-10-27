(function() {
  var counter = 0;
  var btn = document.getElementById('l-btn');
  var form = document.getElementById('form');
  var addInput = function() {
    counter++;
    var input = document.createElement("input");
    input.id = 'email-input-' + counter;
    input.type = 'text';
    input.name = 'name';
    input.placeholder = 'Enter Email ' + counter;
    form.appendChild(input);
  };
  btn.addEventListener('click', function() {
    addInput();
  }.bind(this));
})();

(function() {
  var counter = 0;
  var btn = document.getElementById('r-btn');
  var form = document.getElementById('form');
  var addInput = function() {
    counter++;
    var input = document.createElement("input");
    input.id = 'time-input-' + counter;
    input.classList.add('generated-time-input');
    input.type = 'text';
    input.name = 'name';
    input.placeholder = 'Potential viable time ' + counter;
    form.appendChild(input);
  };
  btn.addEventListener('click', function() {
    addInput();
  }.bind(this));
})();