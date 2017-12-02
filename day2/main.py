import re


def calc_spreadsheet(filename):
    sum = 0
    for line in filename:
        line_values = (re.findall('\d+', line))
        line_values = map(int, line_values)
        sum = sum + (int(max(line_values)) - int(min(line_values)))
    print(sum)


def calc_common_spreadsheet(filename):
    sum = 0
    for line in filename:
        line_values = (re.findall('\d+', line))
        line_values = map(int, line_values)
        for v in line_values:
            for c in line_values:
                if(c != v and v%c == 0):
                    sum = sum + (v/c)
    print(sum)

filename = open('spreadsheet.txt','r')
calc_spreadsheet(filename)

filename = open('spreadsheet2.txt', 'r')
calc_spreadsheet(filename)

filename = open('spreadsheet3.txt', 'r')
calc_common_spreadsheet(filename)

filename = open('spreadsheet2.txt', 'r')
calc_common_spreadsheet(filename)
