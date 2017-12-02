import re


def calc_spreadsheet(filename):
    sum = 0
    for line in filename:
        line_values = (re.findall('\d+', line))
        line_values = map(int, line_values)
        sum = sum + (int(max(line_values)) - int(min(line_values)))
    print(sum)

filename = open('spreadsheet.txt','r')
calc_spreadsheet(filename)

filename = open('spreadsheet2.txt', 'r')
calc_spreadsheet(filename)
