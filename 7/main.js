let numbers = [2, 5, 12, 13, 15, 18, 22];

for(let i = 0; i < numbers.length; i++) {
  if(numbers[i] % 2 === 0) {
    isEven(numbers[i]);
  }
}

function isEven(num) {
  console.log(num + 'は偶数です');
}

class Car {

  constructor(gas, num) {

    this.gas = gas;
    this.num = num;

  }

  getNumGas() {
    console.log(`ガソリンは${this.gas}です。ナンバーは${this.num}です`);
  }

}

let stepWagon = new Car('レギュラー', 1234);
stepWagon.getNumGas();