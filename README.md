# Compare Sorted Files

This PHP script takes two input files containing lexicographically sorted ASCII strings and generates two output files:

- `output1.txt`: Strings found in `input1.txt` but not in `input2.txt`.
- `output2.txt`: Strings found in `input2.txt` but not in `input1.txt`.

## Problem Statement

You have two input files (`input1.txt` and `input2.txt`), where each file contains strings sorted in lexicographical order. Your task is to efficiently find:
1. Strings that appear only in `input1.txt` (write them to `output1.txt`).
2. Strings that appear only in `input2.txt` (write them to `output2.txt`).

## Approach

Since both files are **sorted**, we can efficiently compare them using a **two-pointer technique** (similar to merging two sorted lists). Instead of searching for each line in the entire second file (which would be slow), we **only compare the current lines of both files**.

### **How It Works**
1. Read the **first line of both files**.
2. Compare the lines:
   - If `line1 < line2`, write `line1` to `output1.txt` and read the **next line from `input1.txt`**.
   - If `line1 > line2`, write `line2` to `output2.txt` and read the **next line from `input2.txt`**.
   - If `line1 == line2`, skip both and read the **next line from both files**.
3. Repeat until both files are fully processed.

This approach ensures **O(n) time complexity**, making it efficient even for large files.

## Installation & Usage

### **1. Install PHP (if not installed)**
```bash
sudo apt update
sudo apt install php -y
```

### **2. Run PHP**
```bash
php main.php
```