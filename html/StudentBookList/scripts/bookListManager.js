angular.module('StudentList', []).controller('StudentBookController', function() {

	var storedStudents = localStorage.getItem('students'); 
	var storedBooks = localStorage.getItem('books');

	this.students = (storedStudents !== null) ? JSON.parse(storedStudents) : [];
	this.books = (storedBooks !== null) ? JSON.parse(storedBooks) : [];

	this.countActive = function(){
		return this.students.filter(function(student){
			return student.isActive;
		}).length;
	}

	this.countInactive = function(){
		return this.students.length - this.countActive();
	}

	this.getActiveStyling = function(isActive){
		return isActive ? "success" : "danger";
	}

	this.getStudentBookList = function(studentBookList){
		return this.books.filter(function(book){
			return -1 < studentBookList.findIndex(function(bookId){
				return book.id === bookId;
			});
		});
	}

	this.getStudentCatalogue = function(studentBookList){
		return this.books.filter(function(book){
			return 0 > studentBookList.findIndex(function(bookId){
				return book.id === bookId;
			});
		});
	}

	this.addStudent = function(){
		this.newStudent.isActive = true;
		this.newStudent.id = getNewId(this.students);
		this.newStudent.bookList = [];
		this.students.push(makeStudent(this.newStudent));
		this.saveStudents();

		clearStudentFields(this);
    }

	this.addBook = function(){
		this.newBook.id = getNewId(this.books);
		this.books.push(this.newBook);
		this.saveBooks();

		clearBookFields(this);
	}

	this.deleteStudent = function(id){
		this.students.splice(this.students.findIndex(function(element){
			return element.id === id;
		}), 1);

		this.saveStudents();
	}

	this.deleteBook = function(id){
		this.books.splice(this.books.findIndex(function(element){
			return element.id === id;
		}), 1);

		this.saveBooks();
	}

	this.removeBook = function(student, bookId){
		student.bookList.splice(student.bookList.findIndex(function(element){
			return element.id === bookId;
        }), 1);

		this.saveStudents();
	}	

	this.saveStudents = function(){
		localStorage.setItem('students', JSON.stringify(this.students));
		console.log("how");
	}

	this.saveBooks = function(){
		localStorage.setItem('books', JSON.stringify(this.books));
	}
});

function getNewId(list){

	if(!list.length){
		return 0;
	}

	var sorted = list.sort(function(a, b){
		return b.id - a.id;
	});

	return sorted[0].id + 1;
}

function clearStudentFields(controller){
	controller.newStudent = null;
}

function clearBookFields(controller){
	controller.newBook = null;
}

function makeStudent(newStudent){

	return {"id": newStudent.id,
			"name": newStudent.name,
			"number": newStudent.number,
			"address": newStudent.address,
			"phone": formatNumber(newStudent.pn1, 3) + formatNumber(newStudent.pn2, 3) + formatNumber(newStudent.pn3, 4),
			"gpa": (newStudent.gpa) ? newStudent.gpa : "",
			"major": (newStudent.major) ? newStudent.major : "",
			"year": (newStudent.year) ? newStudent.year : "",
			"isActive": newStudent.isActive,
			"bookList": newStudent.bookList};
}

function formatNumber(number, length){
	return ("" + number).padStart(length, "0");
}
