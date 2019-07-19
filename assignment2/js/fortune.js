var fortunes = [
  "Good things come when you least expect them.",
  "Happy is the bride that the sun shines on.",
  "May the wind be always at your back.",
  "The new boat will find the old stones.",
  "When fortune calls, offer her a chair. ",
  "Every strike brings me closer to the next home run. –Babe Ruth",
  "Strive not to be a success, but rather to be of value. –Albert Einstein",
  "We become what we think about. –Earl Nightingale",
  "Life is 10% what happens to me and 90% of how I react to it. –Charles Swindoll",
  "The mind is everything. What you think you become.  –Buddha",
  "An unexamined life is not worth living. –Socrates",
  "Eighty percent of success is showing up. –Woody Allen",
  "Winning isn’t everything, but wanting to win is. –Vince Lombardi",
  "Whether you think you can or you think you can’t, you’re right. –Henry Ford",
  "The best revenge is massive success. –Frank Sinatra",
  "Believe you can and you’re halfway there. –Theodore Roosevelt",
  "Everything you’ve ever wanted is on the other side of fear. –George Addair",
  "Fall seven times and stand up eight. –Japanese Proverb"
]

var q1 = document.getElementById('q1');
var q2 = document.getElementById('q2');

fortuneGenerator();

var changeAfter = setInterval(fortuneGenerator,10000);


function fortuneGenerator() {
  q1.textContent = fortunes[randomGenarator()];
  q2.textContent = fortunes[randomGenarator()];
}

function randomGenarator() {
  return Math.floor(Math.random() * fortunes.length);
}
