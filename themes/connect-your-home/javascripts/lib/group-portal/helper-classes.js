var Address = function (data) {
    var self = this;

    self.BdNumber = data.BdNumber;
    self.Street = data.Street;
    self.Zip = data.Zip;
    self.City = data.City;
    self.Country = data.Country;
    self.State = data.State;
    self.Suite = data.Suite;

    self.GetFullAddress = function (includeSuite) {
        var addr = self.BdNumber + " " + self.Street + " " + self.City + " " + self.State + " " + self.Zip;
        if (typeof(includeSuite) !== 'undefined' && includeSuite === true) {
            addr += self.Suite;
        }
        return addr;
    }
}

var WidgetState = function () {
    var self = this;

    self.HasBeenChanged = false;
}