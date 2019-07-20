import XCTest

import kitura1Tests

var tests = [XCTestCaseEntry]()
tests += kitura1Tests.allTests()
XCTMain(tests)