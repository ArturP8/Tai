//zadanie 1
const rectangle = {
    height: 10,
    width: 8,
    showArea(){
       return this.height*this.width;
    }

};
const circle = {
radius: 10, 
showArea(){
    return Math.PI * Math.pow(this.radius, 2);
}
};
console.log(rectangle);
console.log(circle);

console.log(`kwadrat ma szerokość ${rectangle.width} i wysokość ${rectangle.height}`);

console.log(`jego pole to ${rectangle.showArea()}`);

console.log(`Koło ma promień ${circle.radius}`);
console.log(`Jego pole to ${circle.showArea().toFixed(2)}`);  


//zadanie 2
const currentUser = {

    name: "adam",
    surname: "nowak",
    email: "anowak123@gmail.com",
    www: "zsegw.pl",
    usertype: "ziemniak",
    isactive: true,

    setActive(active){
this.isactive = active;
    },
  
    show(){
console.log(`name: ${this.name} \nsurname: ${this.surname}  email: ${this.email} \nemail www: ${this.www} \nwww usertype: ${this.usertype} \nusertype isactive: ${this.isactive} \isactive`)
    }

};
currentUser.show();

//zadanie 3
const books ={
    title: " tytul",
    author: " autor",
    pagecount: " ilosc",
    publisher: " wydawnictwo",
    
    showDetails(){
        console.log("For-in loop:");
        for (let key in this) {
          if (typeof this[key] !== 'function') {
            console.log(`${key}: ${this[key]}`);
          }
        }
    
        console.log("\nObject.keys:");
        Object.keys(this).forEach(key => {
          if (typeof this[key] !== 'function') {
            console.log(`${key}: ${this[key]}`);
          }
        });
    
        console.log("\nObject.values:");
        Object.values(this).forEach(value => {
          if (typeof value !== 'function') {
            console.log(value);
          }
        });
    
        console.log("\nObject.entries:");
        Object.entries(this).forEach(([key, value]) => {
          if (typeof value !== 'function') {
            console.log(`${key}: ${value}`);
          }
        });
      }
    };
    
books.showDetails();

//zadanie 4

const spaceShip = {
    name: "Enterprise",
    currentLocation: "Earth",
    flyDistance: 0,
  
    flyTo(place, distance) {
      this.currentLocation = place;
      this.flyDistance += distance;
    },
  
    showInfo() {
      console.log(`Informacje o statku:\n----\nStatek ${this.name}\ndoleciał do miejsca ${this.currentLocation}.\nStatek przeleciał już całkowity dystans ${this.flyDistance} km.`);
    },
  
    meetClingon() {
      let successCount = 0;
  
      for (let i = 0; i < 100; i++) {
        let randomValue = Math.random(); 
        if (randomValue > 0.5) {
          successCount++; 
        }
      }
  
      if (successCount >= 50) {
        console.log(`Statek ${this.name} będący w okolicy ${this.currentLocation} zwycięsko wyszedł ze spotkania z Klingonami.`);
      } else {
        console.warn(`Statek ${this.name} będący w okolicy ${this.currentLocation} został pokonany przez Klingonów.`);
      }
    }
  };
  spaceShip.flyTo("Mars", 300000);
spaceShip.showInfo();
  
  spaceShip.meetClingon();

  //zadanie 5

  const book = {
    users: [],
  
    addUser(name, age, phone) {
      this.users.push({ name, age, phone });
    },
  
    showUsers() {
      console.log("Wszyscy użytkownicy w książce:");
      this.users.forEach((user, index) => {
        console.log(`${index + 1}. Imię: ${user.name}, Wiek: ${user.age}, Telefon: ${user.phone}`);
      });
    },
  
    findByName(name) {
      const user = this.users.find(user => user.name === name);
      if (user) {
        console.log(user);
      } else {
        console.log(false);
      }
    },
  
    findByPhone(phone) {
      const user = this.users.find(user => user.phone === phone);
      if (user) {
        console.log(user);
      } else {
        console.log(false);
      }
    },
  
    getCount() {
      console.log(`Liczba użytkowników w książce: ${this.users.length}`);
    }
  };
  
  book.addUser("Jan", 30, "123-456-789");
  book.addUser("Anna", 25, "987-654-321");
  book.addUser("Tomasz", 40, "555-666-777");
  book.showUsers();
  book.findByName("Anna");
  book.findByPhone("123-456-789");
  book.getCount();
  
  //zadanie 6

  const tableGenerator = {
    randomNumber(min, max) {
      return Math.floor(Math.random() * (max - min + 1)) + min;
    },
    generateIncTable(nr) {
      return Array.from({ length: nr + 1 }, (_, i) => i);
    },
    generateRandomTable(lng, min, max) {
      return Array.from({ length: lng }, () => this.randomNumber(min, max));
    },
    generateTableFromText(str) {
      if (typeof str === 'string') {
        return str.split(' ');
      } else {
        return [];
      }
    },
    getMaxFromTable(arr) {
      return Math.max(...arr);
    },
    getMinFromTable(arr) {
      return Math.min(...arr);
    },
    delete(arr, index) {
      arr.splice(index, 1);
      return arr; 
    }
  };
  
  console.log(tableGenerator.randomNumber(5, 15));
  
  console.log(tableGenerator.generateIncTable(10));
  
  console.log(tableGenerator.generateRandomTable(5, 1, 100));
  
  console.log(tableGenerator.generateTableFromText("przykładowy tekst"));
  
  console.log(tableGenerator.getMaxFromTable([2, 5, 8, 1, 10]));
  
  console.log(tableGenerator.getMinFromTable([2, 5, 8, 1, 10]));
  
  console.log(tableGenerator.delete([1, 2, 3, 4, 5], 2));
  
//zadanie 7

const text = {
  check: function(txt, word) {
      return txt.includes(word);
  },
  getCount: function(txt) {
      return txt.length;
  },
  getWordsCount: function(txt) {
      return txt.split(/\s+/).length;
  },
  setCapitalize: function(txt) {
      return txt.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
  },
  setMix: function(txt) {
      let result = '';
      let upper = false;
      for (let i = 0; i < txt.length; i++) {
          if (upper) {
              result += txt[i].toUpperCase();
          } else {
              result += txt[i].toLowerCase();
          }
          upper = !upper;
      }
      return result;
  },
  generateRandom: function(lng) {
      let result = '';
      const characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      for (let i = 0; i < lng; i++) {
          result += characters.charAt(Math.floor(Math.random() * characters.length));
      }
      return result;
  }
};
console.log(text.check("ala ma kota", "kota")); 
console.log(text.getCount("ala ma kota")); 
console.log(text.getWordsCount("Ala ma kota"));
console.log(text.setCapitalize("ala ma kota"));
console.log(text.setMix("ala ma kota")); 
console.log(text.generateRandom(10));