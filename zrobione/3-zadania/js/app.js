//zadanie 1

class User {
    constructor(nick, name, surname, email, role) {
        this.nick = nick;
        this.name = name;
        this.surname = surname;
        this.email = email;
        this.role = role;
        this.loginDates = [];
        this.active = true;
    }
    logIn() {
        const loginDate = new Intl.DateTimeFormat('pl-PL', {
            dateStyle: 'full',
            timeStyle: 'long'
        }).format(new Date());
        this.loginDates.push(loginDate);
        console.log(`${this.nick} zalogował się: ${loginDate}`);
    }

    showLoginDates() {
        if (this.loginDates.length === 0) {
            console.log(`${this.nick} nie ma jeszcze żadnych dat logowania.`);
            return;
        }
        console.log(`Daty logowania ${this.nick}:`);
        this.loginDates.forEach(date => {
            console.log(date);
        });
    }
    showDetails() {
        console.log(`Szczegóły użytkownika ${this.nick}:`);
        for (const key in this) {
            if (Object.hasOwnProperty.call(this, key)) {
                console.log(`${key}: ${this[key]}`);
            }
        }
    }

    toggleActive() {
        this.active = !this.active;
        console.log(`${this.nick} jest teraz ${this.active ? 'aktywny' : 'nieaktywny'}.`);
    }
}
const users = [
    new User('janK', 'Jan', 'Kowalski', 'jan@email.com', 'admin'),
    new User('annaM', 'Anna', 'mazur', 'anna@email.com', 'editor'),
    new User('piotrW', 'Piotr', 'Winiarski', 'piotr@email.com', 'reader'),
];

users[0].logIn();
users[0].showLoginDates();
users[0].showDetails();
users[0].toggleActive();

console.log('---');

users[1].logIn();
users[1].showLoginDates();
users[1].toggleActive();
users[1].showDetails();

console.log('---');

users[2].logIn();
users[2].showLoginDates();
users[2].toggleActive();
users[2].showDetails();

//zadanie 2

const names = [
    "Baraka", "Jax", "Johnny Cage", "Kitana", 
    "Kung Lao", "Liu Kang", "Mileena", "Raiden", 
    "Reptile", "Scorpion", "Shang Tsung", "Sub-Zero"
];

class Fighter {
    constructor(name, live = 20, power = 3) {
        this.name = name;
        this.live = live; 
        this.power = power;
    }

    attack(who) {
        const attackSuccessful = Math.random() < 0.5; 
        if (attackSuccessful) {
            who.live -= this.power;   
            log.push(`${this.name} zaatakował ${who.name} zadając ${this.power} obrażeń. ${who.name} ma teraz ${who.live} życia.`);
        } else {
            log.push(`${this.name} nie trafił w ${who.name}.`);
        }
    }
}

const log = [];
const fighters = [];

names.forEach(name => {
    fighters.push(new Fighter(name));
});

function getFighter() {
    if (fighters.length === 0) return null;
    const index = Math.floor(Math.random() * fighters.length);
    return fighters.splice(index, 1)[0];
}

let leftFighter = null;
let rightFighter = null;

function loop() {
    if (!leftFighter || !rightFighter) {
        leftFighter = getFighter();
        rightFighter = getFighter();
        if (!leftFighter || !rightFighter) {
            console.log("Brak wojowników, turniej zakończony!");
            return false;
        }
    }

    const attackOrder = Math.random() < 0.5 ? [leftFighter, rightFighter] : [rightFighter, leftFighter];
    attackOrder[0].attack(attackOrder[1]);

    if (leftFighter.live <= 0) {
        log.push(`${leftFighter.name} przegrał! ${rightFighter.name} wygrywa!`);
        leftFighter = null;
        rightFighter.live = 20;   
    } else if (rightFighter.live <= 0) {
        log.push(`${rightFighter.name} przegrał! ${leftFighter.name} wygrywa!`);
        rightFighter = null;
        leftFighter.live = 20;   
    }

    console.clear();
    log.forEach(entry => console.log(entry));

    if (!leftFighter && !rightFighter) {
        console.log("Obaj wojownicy przegrali. Turniej zakończony!");
        return false;
    }

    if (!leftFighter || !rightFighter) {
        leftFighter = null;
        rightFighter = null;
    }

    setTimeout(() => loop(), 100);
}

loop();

// zadanie 3

String.prototype.sortText = function(separator) {
    let wordsArray = this.split(separator);
    
    wordsArray.sort();
    
    return wordsArray.join(separator);
};

let sortedText = "Marcin-Ania-Piotrek-Beata".sortText('-');
console.log(sortedText);  

// zadanie 4

String.prototype.mirror = function() {
    let charArray = this.split('');
    
    charArray.reverse();
    
    return charArray.join('');
};

let reversedText = "Ala ma kota".mirror();
console.log(reversedText); 

//zadanie 5

Array.prototype.sum = function() {
    return this.reduce((acc, current) => acc + current, 0);
};

Array.prototype.sortNr = function() {
    return this.sort((a, b) => a - b);
};

console.log([1, 2, 3].sum());               
console.log([1, 1.2, 11, 22, 2.1].sortNr()); 
